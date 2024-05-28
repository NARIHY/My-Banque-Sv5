<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * pour la partie lobale  de notre appliation
 * On a  besoin d'envoyer les informations dess utilisateurs
 * dans  des requête
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class UtilisateurApiControlleur extends Controller
{
    /**
     * Lister tous les utilisateurs des comptes pour permettre une bonne relations
     * entre Javascript et php
     *
     * @return void
     */
    public function liste()
    {
        /** @var \App\Models\user $utilisateur injection des utilisateurr aactif  dans json */
        $utilisateur = UserResource::collection(User::all());
        return response()->json($utilisateur);
    }
}
