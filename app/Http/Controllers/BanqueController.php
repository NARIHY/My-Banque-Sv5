<?php

namespace App\Http\Controllers;

use App\Models\CompteBancaire;
use App\Models\CompteBancaireCategorie;
use App\Models\Publicite;
use App\Models\Role;
use App\Models\ServiceClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Cette controller sert à gérer la base de notre banque
 * @author NARIHY <Maheninarandrianarisoa@gmail.com>
 * @copyright 2023 NARIHY
 */
class BanqueController extends Controller
{
    /**
     * Methode pour retourner uniquement la vue d'acceuil
     * du tableau de bord de la banque
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $utilisateur = User::count();
        $compte_bancaire = CompteBancaire::count();
        $compte_bancaire_categorie = CompteBancaireCategorie::count();
        $role = Role::count();
        $publiciter = Publicite::count();
        $service_client = ServiceClient::count();
        return view($this->viewPath().'index', [
            'utilisateur' => $utilisateur,
            'compte_bancaire' => $compte_bancaire,
            'compte_bancaire_categorie' => $compte_bancaire_categorie,
            'role' => $role,
            'publiciter' => $publiciter,
            'service_client' => $service_client
        ]);
    }




    /**
     * Permet de retourner la vue en relatif
     * @return string
     */
    private function viewPath(): string
    {
        return "super-admin.";
    }

    /**
     * Permet de retourner la route en absolu
     * @return string
     */
    private function routes(): string
    {
        return "Connected.Administration.";
    }
}
