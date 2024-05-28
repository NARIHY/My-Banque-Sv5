<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurSimpleUpdateRequest;
use App\Models\Role;
use App\Models\ServiceClient;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Pour gérer tous les comptes inscrite dans notre plate-form
 * @author Mahenina RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class GestionDesComptesControlleur extends Controller
{
    /**
     * Liste les diférente rôle dans notre plateforme
     *
     * @return \Illuminate\View\View
     */
    public function liste_role(): View
    {
        /** @var \App\Models\Role Récupération des rôles dans le site */
        $roles = Role::orderBy('id','asc')
                        ->paginate(10);
        return view($this->viewRole().'liste', [
            'roles' => $roles
        ]);
    }
    /**
     * Permet de voir le statistique globale des compte dans une charts graphique
     * On récuperes les inscription via l'api restfule de laravel et
     * on inject ces inforamtions dans une chart graphique
     * On a besoin de javascript pour ça
     *
     * @return \Illuminate\View\View
     */
    public function statistique_globale(): View
    {
        return view($this->view().'statistique_globale.index');
    }

    /**
     * Sauvgarde les modification fait par l'administration
     *
     * @param string $utilisateurId identification de l'utilisateur
     * @param UtilisateurSimpleUpdateRequest $requete
     * @return \Illuminate\Http\RedirectResponse
     */
    public function modifier_un_compte(string $utilisateurId, UtilisateurSimpleUpdateRequest $requete): RedirectResponse
    {
        try {
            $utilisateur = User::findOrFail($utilisateurId);
            $donner_valider = $requete->validated();
            $utilisateur->update($donner_valider);
            return redirect()->back()->with('succes','Mis à jour réussi');
        } catch  (\Exception $e) {
            return redirect()->back()->with('erreur','Oups, il y a eu une erreur, veuillez réésseillez plus tard.');
        }
    }
    /**
     * Permet de voir un compte en particulier dans la liste de vue
     * Boucle dans un try catch pour mieux simuler les erreurs
     * @param string $id id du compte a voir
     * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
     */
    public function vue_sur_un_comptes(string $id): View | RedirectResponse
    {
        try {
            $utilisateur = User::findOrFail($id);
            return view($this->view().'vue_compte.index', [
                'utilisateur'=> $utilisateur
            ]);
        } catch(\Exception $e) {
            return back()->with('erreur', 'il y a eu une erreur, Veuillez rééseiller plus tard');
        }
    }
    /**
     * Retourne en vue la liste de tous les utilisateurs
     * @return \Illuminate\View\View
     */
    public function liste_compte(): View
    {
        $utilisateurs = User::all();
        return view($this->view(). 'liste_compte.index');
    }

    /**
     * Créer le chemin simplifier de la gestion des vue
     * @return string
     */
    private function view(): string
    {
        return "super-admin.gestion_des_comptes.";
    }

    /*
    * Créer le chemin simplifier de la gestion des vue role
    * @return string
    */
    private function viewRole(): string
    {
        return "super-admin.gestion_role.";
    }

    /**
     * Créer le chemin simplifier la gestion des vue
     * @return string
     */
    private function routes(): string
    {
        return "Connected.Administration.GestionDesCompte.";
    }

    /**
     * Facilite le chemin de route de la gestion des rôles
     *
     * @return string
     */
    private function routesRoles(): string
    {
        return "Connecter.Administration.GestionDesRole.";
    }
}
