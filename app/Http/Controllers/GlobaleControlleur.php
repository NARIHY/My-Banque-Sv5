<?php

namespace App\Http\Controllers;

use App\Http\Requests\PubliciterRequest;
use App\Mail\PubliciterEmail;
use App\Models\Publicite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/**
 * Permet gérer les divers contenue inné du plateforme
 * -> Anonce
 * -> Interface Visuel
 * -> Envoye d'email vers les utilisateurs
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class GlobaleControlleur extends Controller
{
    //Pour la gestion de publicité
    /**
     * Retourne la liste des vues de tous les publicité qui ne sont pas poster
     *
     * @return \Illuminate\View\View
     */
    public function publiciter_liste(): View
    {
        $publicites = Publicite::orderBy('created_at','desc')
                                    ->where('users_id', Auth::user()->id)
                                    ->where('users_id', Auth::user()->id)
                                    ->where('status_suprimer', '!=', '1')
                                    ->paginate(20);
        return view($this->publiciteView().'liste', [
            'publicites' => $publicites
        ]);
    }

    /**
     * Permet à l'utilisateur de créer une nouvelle publicité
     *
     * @return \Illuminate\View\View
     */
    public function publiciter_creer(): View
    {
        return view($this->publiciteView(). 'action.random');
    }

    /**
     * Permet de sauvgarder la création d'une nouvelle publicité fait par
     * l'utilisateur
     *
     * @param PubliciterRequest $request
     * @return RedirectResponse
     */
    public function publiciter_sauvgarder_creation(PubliciterRequest $request): RedirectResponse
    {
        $media = $request->validated('media');
        try {
            $data = [
                'users_id' => Auth::user()->id,
                'status_pub' => 'non publié',
                'titre' => $request->validated('titre'),
                'description_publicite' => $request->validated('description_publicite'),
                'media' => $request->validated('media')
            ];
            $publiciter = Publicite::create($data);
            //verifier si l'utilisateur à importer un media
            if ($media !== null && !$media->getError()) {
                $data['media'] = $media->store('publicite.media', 'public');
                $publiciter->update($data);
            }
            return redirect()->route($this->publiciterRoute().'publiciter_liste')->with('succes', 'Félicitation, la publicité a été créer avec succès.');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur', 'Il y a eu une erreur lors de la création de la publicité.');
        }
    }

    /**
     * Permet de modifier une publiciter déjas inscrite dans la base de donnée
     * Si le publicité est dans la corbeille, il est impossible de le | la suprimer
     *
     * @param string $publiciteId
     * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
     */
    public function publiciter_edition(string $publiciteId): View | RedirectResponse
    {
        /** @var \App\Models\Publicite $publicite Recherche de la publicite à modifier */
        $publiciter = Publicite::findOrFail($publiciteId);
        //Vérifier si la publiciter est valide sinon retourner une 404;
        if ($publiciter->status_suprimer !== '0') {
            return redirect()->setStatusCode(404);
        }
        return view($this->publiciteView().'action.random', [
            'publiciter' => $publiciter
        ]);
    }

    /**
     * Permet de sauvgarder l'edition d'une publicité fait par l'utilisateur
     *
     *
     * @param PubliciterRequest $request
     * @param string $publiciteId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publiciter_edition_misajour(PubliciterRequest $request, string $publiciteId): RedirectResponse
    {
        /** @var \App\Models\Publicite $publicite Recherche de la publicite à modifier */
        $publiciter = Publicite::findOrFail($publiciteId);
        $media = $request->validated('media');
        try {
            $publiciter->update($request->validated());
            if($request->hasFile('media')) {
                if ($media !== null && !$media->getError()) {
                    $data['media'] = $media->store('publicite.media', 'public');
                    $publiciter->update($data);
                }
            }
            return redirect()->back()->with('succes', 'Mis à jour de la publicité réussi');
        } catch (\Exception $e) {
            return redirect()->back()->with('erreur', 'Il y a eu une erreur lors de la mis à jour.');
        }
    }

    /**
     * Suprime la publicité indirectement pour éviter les fausses
     * manipulation, Mais le projet est de le supprimer apres une
     * durée bien déterminer, par exemple 3 mois,
     * Au de là de 3 mois la publication seras suprimer
     *
     * Reste plus qu'a ajouter le script
     *
     * @param string $publiciteId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publiciter_supression_simple(string $publiciteId): RedirectResponse
    {
        /** @var \App\Models\Publicite $publicite Recherche de la publicite à mettre dans la corbeille */
        $publiciter = Publicite::findOrFail($publiciteId);
        $publiciter->update([
            'status_suprimer' => '1'
        ]);
        return redirect()->back()->with('succes', 'Supréssion de la publicité réussi');
    }

    /**
     * Suprime directement une publicités, seule les administrateurs ont le droit de
     * le faire
     * Besoin de mettre une regle; (Policy)
     *
     * @param string $publiciteId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publiciter_suprimer_directement(string $publiciteId): RedirectResponse
    {
        /** @var \App\Models\Publicite $publicite Recherche de la publicite à suprimer */
        $publiciter = Publicite::findOrFail($publiciteId);
        try {
            $publiciter->delete();
            return redirect()->back()->with('succes', 'Supréssion de la publicité réussi');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur', 'Il y a eu une erreur lors de la supréssion.');
        }
    }

    /**
     * Permet d"envoyez la publicité créer vers tous les utilisateurs
     *
     * nb: Il y a une problème lors du post des email lorsque le nombre de
     * l'utilisateur sont supérieur à 250
     * Problème sur l'import d'image besoin de le rectifier
     *
     * @param string $publiciteId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publiciter_poster(string $publiciteId): RedirectResponse
    {
        /** @var \App\Models\Publicite $publicite Recherche de la publicite à suprimer */
        $publiciter = Publicite::findOrFail($publiciteId);
        /** @var \App\Models\User $utilisateur Pour l'envoye d'email */
        $utilisateur = User::limit(1)
                            ->get();
        /** @var \App\Mail\PubliciterEmail $email Creer l'email à envoyer  */
        $email = new PubliciterEmail($publiciteId);
        try {
            foreach ($utilisateur as $utilisateurs) {
                Mail::to($utilisateurs->email)->send($email);
            }
            //Mis a jour de la publiciter
            $publiciter->update([
                'status_pub' => 'publié'
            ]);
            return redirect()->back()->with('succes','Mail envoyée.');
        } catch (\Exception $e) {
            return redirect()->back()->with('erreur','Il y a eu une erreur lors de l\'envoie d\'email.');
        }
    }

    // Méthode priver
    /**
     * Permet d'avoir le chemin des anonce
     *
     * @return string
     */
    private function anonceView(): string
    {
        return $this->viewBase().'anonce.';
    }
    /**
     * Permet d'avoir le chemin de la publicite
     *
     * @return string
     */
    private function publiciteView(): string
    {
        return $this->viewBase().'Publiciter.';
    }
    /**
     * Retourne le chemin générale du chemin de vue
     *
     * @return string
     */
    private function viewBase(): string
    {
        return 'super-admin.globale.';
    }

    /**
     * REtourne le nom de base de la route globale
     *
     * @return string
     */
    private function baseRoute(): string
    {
        return 'Connecter.Administration.Globale.';
    }

    private function publiciterRoute(): string
    {
        return $this->baseRoute(). 'Publicite.';
    }
}
