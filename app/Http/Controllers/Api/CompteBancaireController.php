<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompteBancaireResource;
use App\Models\CompteBancaire;
use Illuminate\Http\Request;
/**
 * Controlle tous les liens externe des comptes bancaires
 * Api
 * Ne controlle pas les parametre générale des comptes bancaires Mais seulement pour ce ce qui est
 * de l'apî avec les méthode get/post/put uniquement
 * @api
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class CompteBancaireController extends Controller
{
    /**
     * Retourn un vue en json, pour voir tous les liste des comptes
     *  dans la banque
     */
    public function liste_compte()
    {
        /** @var \App\Models\CompteBancaire $compteBancaire Modele à serialiser */
        $compte_bancaire = CompteBancaireResource::collection(CompteBancaire::where('corbeille', '!=', '1')
                                                                                ->orderBy('created_at','desc')
                                                                                ->paginate(20));
        return response()->json($compte_bancaire);
    }
}
