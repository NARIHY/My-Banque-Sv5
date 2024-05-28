<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Controller qui permet de rendre les utilisateurs vers les divers erreur
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class DiversController extends Controller
{
    /**
     * Acces refuser
     *
     * @return \Illuminate\View\View
     */
    public function acces_refuser(): View
    {
        $utilisateur = Auth::user();
        return view($this->viewPath(). 'acces_refuser', [
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Instance de la chemin principale
     *
     * @return string
     */
    private function viewPath(): string
    {
        return "public.erreur.";
    }
}
