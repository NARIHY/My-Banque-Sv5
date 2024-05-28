<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbonementCompteBancaireRequest;
use App\Models\CompteBancaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\CompteBancaireCategorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * Methode qui permet de gérer les clients de notre banque
 * le permet de créer une compte banquaire si il n'en a pas encore
 * Mais si il en as, le redirige vers sont compte
 * Cette application herite de EDUCA
 * @author NARIHY <Maheninarandrianarisoa@gmail.com>
 * @copyright 2023 NARIHY
 */
class ClientController extends Controller
{
    /**
     * Liste tous les service de notre application
     *
     * @return View
     */
    public function nos_service(): View
    {
        return view('public.service.index');
    }
    /**
     * Methode qui permet de saluer les utilisateurs après
     * avoir s'authentifier
     * @return \Illuminate\View\View
     */
    public function salutation(): View
    {
        $categ1 = CompteBancaireCategorie::findOrFail(1);
        $categ2 = CompteBancaireCategorie::findOrFail(2);
        $categ3 = CompteBancaireCategorie::findOrFail(3);
        $categ4 = CompteBancaireCategorie::findOrFail(4);
        return view($this->viewPath().'salutation', [
            'categ1' => $categ1,
            'categ2' => $categ2,
            'categ3' => $categ3,
            'categ4' => $categ4,
        ]);
    }

    /**
     * Méthode qui nous permet d'y aller dans la vue de
     * création d'un compte bancaire, seule les utilisateur qui ne
     * possèdent pas de compte peuent y acceder
     * Ajouter aussi des catégorie a des comptes pour rendre la reccette
     * plus attrayante
     * On fait toujour une verification si le client possèdent déjàs un compte
     * @return \Illuminate\View\View
     */
    public function commencer(): View
    {
        $utilisateur = Auth::user();
        $verifier = CompteBancaire::where('users_id', $utilisateur->id)->count();
        //Récupération des catégorie de compte
        $compte_categorie = CompteBancaireCategorie::orderBy('created_at', 'asc')
                                                        ->where('status', '!=', '1')
                                                        ->limit(5)
                                                        ->get();
        return view($this->viewPath(). 'commencer.index', [
            'compte_categorie' => $compte_categorie
        ]);
    }

    /**
     * Permet de détailler ce que fait chaque type
     * de catégorie de compte bancaire
     * On fait toujour une verification si le client possèdent déjàs un compte
     * @param string $nomCategorie Le nom du catégorie dans l'url
     * @param string $id l'id de type de catégorie
     * @return \Illuminate\View\View
     */
    public function detailler_linscription(string $nomCategorie, string $id): View
    {
        /** @var \App\Models\CompteBancaireCategorie $categorie Récupération d'une seule catégorie de compte  */
        $categorie = CompteBancaireCategorie::findOrFail($id);
        $utilisateur = Auth::user();
        $verifier = CompteBancaire::where('users_id', $utilisateur->id)->count();
        return view($this->viewPath(). 'commencer.detaileCategorie', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Permet de souscrire un utilisateur dans une compte bancaire
     * dans cette logique du code, je doit essayer de créer un script sécuriser
     * qui permet de faire l'abonnement de l'utilisateur.
     * On doit faire que le client soit renvoyer dans une vue qui le permet de
     * créer sont compte bancaire, le compte bancaire doivent être créer aux moment
     * même ou l'utilisateur souscrit mais pour que cette compte soit fonctionnelle
     * l'utilisateur devrait envoyer par email ses information personnelle :
     *  Il devrait mettre dans l'objet de l'email sa demande de création de compte avec
     *  l'identification qui lui est envoyer par email aux moment ou il a créer sont compte
     *  et dans la partie de l'email:
     *                              - Photocopie legaliser de son CIN
     *                              - Une photo d'identité
     *                              - Une carte de résidence d'aux moin 4 mois
     *                              - (Optionnel pour le période de test)  la référence de l'argent qu'il a envoyer pour l'activation de son compte
     *
     * @param string $nomCategorie Le nom du catégorie dans l'url
     * @param string $id l'id de type de catégorie
     * @return \Illuminate\View\View
     */
    public function abonement(string $nomCategorie, string $id): View
    {
         /** @var \App\Models\CompteBancaireCategorie $categorie Récupération d'une seule catégorie de compte  */
         $categorie = CompteBancaireCategorie::findOrFail($id);
        //verification si le client possèdent déjàs un compte
        $utilisateur = Auth::user();
        return view($this->viewPath(). 'commencer.abonnement.index', [
            'categorie' => $categorie
        ]);
    }
    /*
        NOTICE Très important pour la sauvgarde des éléments avec
        des relation.
        exemple:
            $blog = Blog::create($request->validated());
            $blog->sampana()->sync(['blog_id' => $blog->id], $request->validated('category'));
            variable_de_la_classe->nomDeLaRelationDansLeModele()->sync(['id_etrangere' => id_etrangere], donner valider)
    */

    /**
     * Permet de sauvgarder les élément entrés par l'utilisateur lors de
     * l'inscription sur une type de catégorie de compte bancaire
     * Quelque explicaiton du script:
     *              - On vérifier si le client possèdent déjàs une compte
     *              - Maintenant on récupère tous les élément valider par l'utilisateur et l'injecter dans une nuovelle tableau avec de nouveau parametre
     *              - On créer le numéro de compte aleatoire et unique du client
     *              - On crypt le code secret du client pour que sont code pour faire des tansaction soit sécuriser
     *              - J'ai créer une tableau qui permet de sauvgarder les informations dans l'entité compte_bancaires
     * Il y a deux sorte de possibilité, soit il y a aucune erreur soit j'ai mieux afficher si il y a une erreur pour éviter les affichage des codes directe.
     * Tous les affichage d'erreur direct dooivent être enlever aux moment ou notre plateforme est en production
     * @param string $nomCategorie Le nom du catégorie dans l'url
     * @param string $id l'id de type de catégorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function souscription(string $nomCategorie, string $id, AbonementCompteBancaireRequest $request): RedirectResponse
    {
        //Vérifie si l'utilisateur à remplis tous ses informations personnelle
        if($this->verifier_si_utilisateur_peut_creer_un_compte() === true) {
            return redirect()->back()->with('erreur', 'Vous ne pouvez pas créer un compte chez nous si vous ne remplisser pas vos informations personnelle.');
        }
        //verification si le client possèdent déjàs un compte
        $utilisateur = Auth::user();
        $verifier = CompteBancaire::where('users_id', $utilisateur->id)->count();
        if($verifier > 0) {
            return redirect()->back()->with('erreur', 'Ce compte ne peut pas créer une autre compte bancaire chez nous car elle y possède déjàs.');
         }
        try {
            $numero = rand(10000000000000,99999999999999);
            $numero_compte = $this->verifier_numero_compte($numero);
            $code_secret = Hash::make($request->validated('code_secret'));
            $cin_utilisateur = $request->validated('cin');
            //Si le cin de l'utilisateur est déjàs inscrit dans la table alors renvoyé une erreur
            $verification_cin = CompteBancaire::where('cin', $cin_utilisateur)
                                                    ->count();
            if($verification_cin > 0) {
                return redirect()->back()->with('erreur', 'Ce CIN ne peut pas être utilisé dans notre banque. Veuillez contactez notre service client pour plus d\'information.');
            }
            $addresse_utilisateur = $request->validated('addresse');
            $sauvgarde = [
                'cin' => $cin_utilisateur,
                'code_secret' => $code_secret,
                'numero_compte' => $numero_compte,
                'addresse' => $addresse_utilisateur,
                'users_id' => Auth::user()->id,
                'compte_bancaire_categorie_id' => $id,
                'status_compte_id' => 1
            ];
            $compte_bancaire = CompteBancaire::create($sauvgarde);
            return redirect()->route($this->routes().'NouveauMenbre.detailler_linscription',['nomCategorie' => $nomCategorie, 'id' => $id])->with('succes','Félicitation, votre demande est en cours de traitement.');
        } catch(\Exception $e) {
            return redirect()->route($this->routes().'NouveauMenbre.abonement',['nomCategorie' => $nomCategorie, 'id' => $id])->with('erreur','il y a eu une erreur'. $e->getMessage());
        }
    }

    /**
     * Il y a une probleme ici, j'ai rectifier en retour bool mais il faut bien voir tous les aspect de ceci
     * Je récupère l'utilisateur connecter puis je vérirfie si l'utilisateur
     * à déjàs remplis tous les informations qui le concerne
     * comme sont nom, sont prénon,  sa date d'anniversaire, une photo
     * Aucune parametre nécessaire
     * @return bool
     */
    private function verifier_si_utilisateur_peut_creer_un_compte(): bool
    {
        $utilisateur = Auth::user();
        if (empty($utilisateur->name)){
            return true;
        } elseif (empty($utilisateur->last_name)) {
            return true;
        } elseif (empty($utilisateur->birthday)) {
            return true;
        } elseif( empty($utilisateur->picture)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Permet de vérifier si le numéro de compte existe déjas;
     * si le numéro de compte existe déjàs il recrait un numéro de compte
     * et vice versa
     * @param string $numero_compte
     * @return string
     */
    private function verifier_numero_compte($numero_compte): string
    {
        $utilisateur = Auth::user();
        $compte_verifier = CompteBancaire::where('users_id', $utilisateur->id)
                                            ->where('numero_compte', '==', $numero_compte)
                                            ->count();
        if($compte_verifier > 0) {
            return  $numero_compte = rand(10000000000000,99999999999999);
        }
        return $numero_compte;
    }

    /**
     * Raccourci sur le nom des routes
     * @return string
     */
    private function routes(): string
    {
        return "Connecter.Client.";
    }

    /**
     * Permet de retourner la vue en absolu
     * @return string
     */
    private function viewPath(): string
    {
        return "public.";
    }
}
