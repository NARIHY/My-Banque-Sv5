<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompteBancaireCategorieRequest;
use App\Http\Requests\MajCompteBancaireCategorie;
use App\Http\Requests\ModificationComptePersonnalisableRequest;
use App\Http\Requests\StatusCompteRequest;
use App\Models\CompteBancaire;
use App\Models\CompteBancaireCategorie;
use App\Models\StatusCompte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Cette classe nous permet de gérer tous les aspects
 * générale de notre banque.
 * Nb: En ce moment notre banque est encore virtuel et non physique
 * @author RANDRIANARISOA <Maheninarandrianarisoa@gmail.com>
 * @copyright 2023 RANDRIANARISOA
 */
class CompteBancaireController extends Controller
{
    /*
        NOTICE Très important pour la sauvgarde des éléments avec
        des relation.
        exemple:
            $blog = Blog::create($request->validated());
            $blog->sampana()->sync(['blog_id' => $blog->id], $request->validated('category'));
            variable_de_la_classe->nomDeLaRelationDansLeModele()->sync(['id_etrangere' => id_etrangere], donner valider)
    */
    /**
     * Aucune parametre par defaut car elle ne retorne
     * seulement que la liste de vue de base des  ensemble
     * de catégorie de compte bancaire qui éxiste dans le plateforme
     * @return \Illuminate\View\View
     */
    public function liste_categorie(): View
    {
        /** @var array $compte_categorie On vas injecter ici l'ensemble des categorie qui existe dans l'application */
        $compte_categorie = CompteBancaireCategorie::orderBy('created_at', 'asc')
                                                        ->where('status', '!=', '1')
                                                        ->limit(5)
                                                        ->get();
        return view($this->viewPath().'categorie_compte.liste', [
            'compte_categorie' => $compte_categorie
        ]);
    }

    /**
     * Permet de renvoyer vers la vue de création d'une
     * catégorie de compte bancaire
     * @return \Illuminate\View\View
     */
    public function creation_categorie(): View
    {
        return view($this->viewPath().'categorie_compte.action.random');
    }

    /**
     * Permet de sauvgarder les éléments valider par les utilisateurs
     * @param \App\Http\Requests\CompteBancaireCategorieRequest $request Recupération des données valider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enregistrement_categorie(CompteBancaireCategorieRequest $request): RedirectResponse
    {
        $donner_valider = $request->validated();
        $photo_couverture = $request->validated('photo_couverture');
        try {
            $nouveauCateg = CompteBancaireCategorie::create($donner_valider);
            if($photo_couverture !== null && !$photo_couverture->getError()) {
                $donner['photo_couverture'] = $photo_couverture->store('banque/categorie_compte', 'public');
                $nouveauCateg->update($donner);
            }
            return redirect()->route($this->routes(). 'liste_categorie')->with('succes', 'Création du catégorie réussi');
        } catch(\Exception $e) {
            return redirect()->route($this->routes().'creation_categorie')->with('erreur'. $e->getMessage());
        }

    }

    /**
     * Permet à l'utilisateur|Modérateur|Responsable de la banque
     * de modifier un catégorie de compte
     * @param string $id Identification du categorie de compte
     * @return \Illuminate\View\View
     */
    public function modification_dune_categorie(string $id): View
    {
        $categorie =  CompteBancaireCategorie::findOrFail($id);
        return view($this->viewPath().'categorie_compte.action.random', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Permet de modifier une catégorie de compte bien en
     * particulier
     * @param \App\Http\Requests\MajCompteBancaireCategorie $majRequest Méthode de validation pour la mis à jour
     * @param string $id Identification du categorie de compte
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarder_la_modification(MajCompteBancaireCategorie $majRequest,string $id): RedirectResponse
    {
        //Retourne une 404 si non trouver
        $categorie = CompteBancaireCategorie::findOrFail($id);
        try {
            //Récupération des données valider
            $donner_valider = $majRequest->validated();
            //mettre à jour les information
            $categorie->update($donner_valider);
            //vérification si la photo de couverture n'est pas vide
            $photo_couverture = $majRequest->validated('photo_couverture');
            if(!empty($photo_couverture)) {
                //Vérification si il y a une image puis la suprimer
                if(!empty($categorie->photo_couverture)) {
                    Storage::disk('public')->delete($categorie->photo_couverture);
                    $donner['photo_couverture'] = $photo_couverture->store('banque/categorie_compte', 'public');
                    $categorie->update($donner);
                }
            }
            return redirect()->route($this->routes().'modification_dune_categorie',['id' => $categorie->id])->with('succes','Mis à jour du catégorie de compte réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'modification_dune_categorie',['id' => $categorie->id])->with('erreur','Il y a eu une erreur lors de la modification '. $e->getMessage());
        }
    }

    /**
     * Ne suprime pas directement les catégorie de compte mais
     * le stocke plustôt dans un corbeil
     * parametre nécessaire l'identification du categorie du compte bancaire| Route en delete
     * Il ne reste plus que créer la corbeille adequat
     * '1' True  && '0' false
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function suppression_simple(string $id): RedirectResponse
    {
        try {
            //utilisation de findOrFail pour mieux retourner une 404 si faux
            $categorie = CompteBancaireCategorie::findOrFail($id);
            $status = [
                'status' => '1'
            ];
            $categorie->update($status);
            return redirect()->route($this->routes().'liste_categorie')->with('succes','Supréssion du catégorie réussi');
        } catch(\Exception $e) {
            return redirect()->route($this->routes().'liste_categorie')->with('erreur','Une erreur c\'est survenue lors de la supréssion'. $e->getMessage());
        }
    }

    /**
     * Nous permet de mieux personnaliser les différent
     * type de catégorie de compte que notre banque possèdent
     * @param string $id qui est l'id du catégorie du compte à personaliser
     * @return \Illuminate\View\View
     */
    public function categorie_compte_personnalisable(string $id): View
    {
        $categorie_compte_perso = CompteBancaireCategorie::findOrFail($id);
        return view($this->viewPath(). 'categorie_compte.personalisable.categorieComptePersonnalisable', [
            'categorie' => $categorie_compte_perso
        ]);
    }

    /**
     * permet de sauvgarder la modification sur la vue de personnalisation
     * d'un type de catégorie de compte de notre banque.
     * Reste à faire les test sur la méthode categorie_compte_personnalisable et sauvgarder_modification_compte_personnalisable
     * @param \App\Http\Requests\ModificationComptePersonnalisableRequest $request Méthode de validation
     * @param string $id l'identification du type de compte bancaire à modifier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarder_modification_compte_personnalisable(ModificationComptePersonnalisableRequest $request,string $id): RedirectResponse
    {
        /** @var \App\Models\CompteBancaire $categorie Une une instance d'une type de catégorie de compte bancaire */
        $categorie = CompteBancaireCategorie::findOrFail($id);
        try {
            $donner = $request->validated();
            //Vérifier si le tarif est inférieur à 4999
            if($request->validated('tarif') < '5000') {
                return redirect()->route($this->routes().'categorie_compte_personnalisable', ['id' => $id])->with('erreur', 'Le tarif ne peut être inférieur à 5000 MGA');
            }
            //verifier si le nombre de jour est inférieur à 5 ou supérieur à 7
            if($request->validated('jour_douverture') < '5' || $request->validated('jour_douverture') > '7') {
                return redirect()->route($this->routes().'categorie_compte_personnalisable', ['id' => $id])->with('erreur', 'Le nombre de jour d\'ouverture ne peut-être inférieur à 5 ou supérieur à 7');
            }
            $categorie->update($donner);
            return redirect()->route($this->routes().'categorie_compte_personnalisable', ['id' => $id])->with('succes', 'Mis à jour réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->routes().'categorie_compte_personnalisable', ['id' => $id])->with('erreur', 'il y a eu une erreur lors de la modification'. $e->getMessage());
        }
    }

    /** NOTICE: Important ces méthode sont pour les status de compte uniquement */

    /**
     * Permet de lister tous les comptes qui sont ajouté dans
     * l'entité compte_bancaire sans aucune condition
     * Aucune parametre nécessaire pour le moment
     * @return \Illuminate\View\View
     */
    public function liste_des_compte(): View
    {
        /*
        $compte_bancaire = CompteBancaire::orderby('created_at', 'desc')
                                            ->where('corbeille', '!=', '1')
                                            ->get();*/
        //Pour les tests direct uniquement
        //$compte = CompteBancaire::findOrFail(26);
        return view($this->viewPath().'listeCompte.liste_compte');
    }

    /**
     * Nous liste les status des comptes bancaire lors de l'inscription
     * Aucune parametre nécessaire pour le moment
     * @return \Illuminate\View\View
     */
    public function liste_status_compte(): View
    {
        $status_compte = StatusCompte::orderBy('id', 'asc')
                                        ->get();
        return view($this->viewPath().'status_compte.index', [
            'status_compte' => $status_compte
        ]);
    }

    /**
     *  Permet d'ajouter une nouvelle status aux différente compte bancaire
     *  Pour voir l'état d'un compte en particulier
     *  @return \Illuminate\View\View
     */
    public function creation_status_compte(): View
    {
        return view($this->viewPath().'status_compte.action.random');
    }

    /**
     * Pour sauvgarder les donner entrer par les utilisateurs
     * dans l'entité status des compte
     * @param \App\Http\Requests\StatusCompteRequest $request //Méthode de validation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarde_status_compte(StatusCompteRequest $request): RedirectResponse
    {
        //récupérer les donner valider
        $donner = $request->validated();
        try {
            $status_compte = StatusCompte::create($donner);
            return redirect()->route($this->statusRoute().'liste_status_compte')->with('succes', 'Création du status de compte réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->statusRoute().'creation_status_compte')->with('erreur', 'Il y a eu une erreur, veuillez réésseiller plus tard'. $e->getMessage());
        }
    }

    /**
     * Rende vers la vue de modification d'une status de compte
     * en particulier
     * @param string $id l'identifiacation du status de compte à modifier
     * @return \Illuminate\View\View
     */
    public function modification_status_compte(string $id): View
    {
        $status_compte = StatusCompte::findOrFail($id);
        return view($this->viewPath().'status_compte.action.random', [
            'status' => $status_compte
        ]);
    }
    /**
     * Pour sauvgarder les donner modifier par les utilisateurs
     * dans l'entité status des compte
     * @param string $id l'identifiacation du status de compte à modifier
     * @param \App\Http\Requests\StatusCompteRequest $request //Méthode de validation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarde_modification_status_compte(string $id, StatusCompteRequest $request): RedirectResponse
    {
        //récupérer les donner valider
        $donner = $request->validated();
        try {
            $status_compte = StatusCompte::findOrFail($id);
            $status_compte->update($donner);
            return redirect()->route($this->statusRoute().'modification_status_compte',['id' => $status_compte->id])->with('succes', 'Modification réussi');
        } catch (\Exception $e) {
            return redirect()->route($this->statusRoute().'modification_status_compte',['id' => $status_compte->id])->with('erreur', 'Il y a eu une erreur, veuillez réésseiller plus tard'. $e->getMessage());
        }
    }

    /**
     * Permet de suprimer un status de compte en particulier
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function suprimer_status_compte(string $id): RedirectResponse
    {
        try {
            $status_compte = StatusCompte::findOrFail($id);
            $status_compte->delete();
            return redirect()->route($this->statusRoute().'liste_status_compte')->with('succes', 'Supréssion du status de compte '. $status_compte->titre. ' réussi');
        } catch(\Exception $e) {
            return redirect()->route($this->statusRoute().'liste_status_compte')->with('erreur', 'il y a eu une erreur lors de la supréssion, veuillez réesseillez plus tard'. $e->getMessage());
        }
    }

    /*
    Notice méthode pour voir tous les détaille des comptes
    qui sont inscrit dans l'entité compte bancaire
    */

    /**
     * Permet de voir les détailles sur un compte en particulier
     * @param string $id Identification du compteBancaire
     * @return \Illuminate\View\View
     */
    public function detail_sur_un_compte(string $id): View
    {
        $compte_bancaire = CompteBancaire::findOrFail($id);
        return view($this->viewPath().'listeCompte.vue.vue', [
            'compte_bancaire' => $compte_bancaire
        ]);
    }

    /**
     * Permet d'activer un compte bancaire qui vient d'être créer
     * @param string $id l'identification du compte à activer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activer_un_compte(string $id): RedirectResponse
    {
        $compte_bancaire = CompteBancaire::findOrFail($id);
        try {
            if($compte_bancaire->status_compte_id !== 1) {
                return redirect()->back(302,['id' => $id])->with('erreur','Désoler, vous n\'avez pas le privillège de rendre à nouveau ce compte actif');
            }
            $status_compte = [
                'status_compte_id' => 2
            ];
            $compte_bancaire->update($status_compte);
            return redirect()->back(302,['id' => $id])->with('succes','Le compte a été activer avec succès');
        } catch(\Exception $e) {
            return redirect()->back(302,['id' => $id])->with('erreur','Il y a eu un problème lors de l\'activation du compte'. $e->getMessage());
        }
    }

    /**
     * Permet de mettre un compte dans un corbeille virtuelle
     * Ce que je pense c'est que je devrait créer un model pour relier tous
     * les éléments dans le corbeille virtuel, pour aménager un peut notre serveur
     * des taches lourde
     * @param string $compteId l'identification du compte bancaire
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mettre_un_compte_inactif(string $compteId): RedirectResponse
    {
        $compte_bancaire = CompteBancaire::findOrFail($compteId);
        if($compte_bancaire->corbeille === 1) {
            return redirect()->back()->with('erreur', 'Désoler, vous n\'avez pas d\'autorisation pour éffectuer cette opération');
        }
        try {
            $corbeille = [
                'corbeille' => 1
            ];
            $compte_bancaire->update($corbeille);
            return redirect()->back()->with('succes', 'Suppréssion du compte bancaire réussi');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur', 'Il y a eu une érreur lors de la supréssion du compte'. $e->getMessage());
        }
    }

    /**
     * Affiche tous les différent compte qui sont en corbeille
     * ne fait rien, Tous les comptes suprimer doivent être examiner avant
     * d'être réellement suprimer durée 3 mois
     * @return View
     */
    public function corbeille(): View
    {
        $compte_bancaire = CompteBancaire::where('corbeille', '!=', '0')
                                                ->get();
        return view($this->viewPath().'corbeille.index', [
            'compte_bancaire' => $compte_bancaire
        ]);
    }


    /**
     * Suprime direct un compte bancaire et le remet à null
     * @param string $compteId l'identification du compte à suprimer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function supression_direct_compte(string $compteId): RedirectResponse
    {
        $compte_bancaire = CompteBancaire::findOrFail($compteId);
        try {
            $compte_bancaire->delete();
            return redirect()->back()->with('succes','Supréssion du compte réussi');
        } catch (\Exception $e) {
            return redirect()->back()->with('erreur', 'Il y a eu une erreur lors de la supréssion');
        }
    }

    //Notice: Statistique des comptes bancaires

    /**
     * Retourne les statistique directe
     *  Sous format Requête AJAX
     * @return View
     */
    public function statistique(): View
    {
        $categorie = CompteBancaireCategorie::count();
        $compte_bancaire = CompteBancaire::where('corbeille', '!=', '1')->count();
        $corbeille = CompteBancaire::where('corbeille', '!=', '0')->count();
        return view($this->viewPath().'statistique.index',[
            'categorie' => $categorie,
            'compte_bancaire' => $compte_bancaire,
            'corbeille' => $corbeille
        ]);
    }

    /**
     * Retourne directement le chemin en relatif du module
     * des catégorie de compte bancaire
     * @return string
     */
    private function viewPath(): string
    {
        return "super-admin.banque.";
    }

    /**
     * Retourne directement le chemin relatif des route en
     * chaine de caractère
     * @return string
     */
    private function routes(): string
    {
        return "Connecter.Administration.CompteBancaireCategorie.";
    }

    /**
     * Retourne la route perso pour les status des compte
     * @return string
     */
    private function statusRoute(): string
    {
        return "Connecter.Administration.CompteBancaire.StatusCompte.";
    }
}
