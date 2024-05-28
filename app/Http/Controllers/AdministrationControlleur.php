<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ModifComptUtilisateurAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Permet de gérer les partie générale de l'administration
 */
class AdministrationControlleur extends Controller
{
    /**
     * Permet de voir le profile de l'utilisateur qui est connecter
     *  Aucune parametre necessaire
     * @return \Illuminate\View\View
     */
    public function voir_compte(): View
    {
        $utilisateur = Auth::user();
        return view($this->viewPath().'monProfile', [
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Nous renvoye vers la vue de modification des informations
     * personnelle de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function modification_parametre_compte(): View
    {
        $utilisateur = Auth::user();
        return view($this->viewPath().'parametre', [
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Vue pour modifier  les informations personnelle d'un utilisateur
     *
     * @return View
     */
    public function modification_info_personnelle(): View
    {
        $utilisateur = Auth::user();
        return view($this->viewPath().'perso.informationPersonnelle', [
            'utilisateur' => $utilisateur
        ]);
    }
    /**
     * Permet de sauvgarder les données entrer par l'utilisateur
     * lors des mis à jours de ces informations
     * Nb: Si l'utilisateur change sont email il doit reconfirmer son compte
     * @param \App\Http\Requests\ModifComptUtilisateurAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarder_une_modification_dun_admin_compte(ModifComptUtilisateurAdminRequest $request)//: RedirectResponse
    {

        $request->user()->fill($request->validated());
         $utilisateur = User::findOrFail(Auth::user()->id);

         $requete = $request->validated();
         $picture = $request->validated('picture');
         try {
             $utilisateur->update($requete);
             if ($request->user()->isDirty('email')) {
                 $request->user()->email_verified_at = null;
             }
             $request->user()->save();
             //verifier si l'utilisateur à importer unne photo
             if ($picture !== null && !$picture->getError()) {
                 $data['picture'] = $picture->store('utilisateur', 'public');
                $utilisateur->update($data);
            }
            return redirect()->back()->with('succes','Mis à jour réussi');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur','Il y a eu une erreur lors de la modification');
        }
    }


    /**
     * Permetre aux utilisateur de suprimer son compte
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function suprimer_compte(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    /**
     * Chemin relatif de la vue de profile
     *
     * @return string
     */
    private function viewPath(): string
    {
        return "super-admin.profile.";
    }
}
