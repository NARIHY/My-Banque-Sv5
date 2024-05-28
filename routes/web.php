<?php

use App\Http\Controllers\AdministrationControlleur;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompteBancaireController;
use App\Http\Controllers\DiversController;
use App\Http\Controllers\GestionDesComptesControlleur;
use App\Http\Controllers\GlobaleControlleur;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceClientController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';
//Route pour la partie public


//Route pour la partie connecter
Route::prefix('/Connecter')->middleware(['auth','verified'])->name('Connecter.')->group( function () {
    //Route pour la partie simple utilisateur Connecter.Client.NouveauMenbre.commencer
    Route::prefix('/Client')->name('Client.')->group( function () {
        Route::get('/', [ClientController::class, 'salutation'])->name('salutation');
        //Nos service
        Route::get('/Nos-service', [ClientController::class, 'nos_service'])->name('nos_service');
        //Pas de compte bancaire
        //Route pour la création d'un compte bancaire
        Route::prefix('/nouveau-membre')->name('NouveauMenbre.')->group( function () {
            //Vue seulement pour la création de compte
            Route::get('/', [ClientController::class, 'commencer'])->name('commencer');
            //Vue sur une seul catégorie de type de compte bancaire
            Route::get('/Ma-banque-{nomCategorie}-z{id}5zol14', [ClientController::class,'detailler_linscription'])->name('detailler_linscription');
            //S'inscire en get et en post avec une catégorie de compte bancaire bien déterminer dans Client controller
            Route::get('/Ma-banque-{nomCategorie}-z{id}5zol14/souscription', [ClientController::class,'abonement'])->name('abonement');
            Route::post('/Ma-banque-{nomCategorie}-z{id}5zol14/souscription', [ClientController::class,'souscription'])->name('souscription');

        });
        //Le client possedent déjàs un compte
        Route::prefix('/Ma-banque')->name('MaBanque.')->group( function () {

        });
        //Si l'utilisateur n'a pas d'acces
        Route::prefix('/Erreur')->name('Erreur.')->group( function () {
            Route::get('/acces-refuser', [DiversController::class, 'acces_refuser'])->name('acces_refuser');
        });
        //service client de la partie public
        Route::prefix('/ServiceClient')->name('ServiceClient.')->group( function () {
            //Pour gérer les contacte direct
            Route::prefix('/Nous-contactez')->name('NousContactez.')->group( function () {
                Route::get('/',[ServiceClientController::class, 'nous_contactez'])->name('nous_contactez');
                Route::post('/',[ServiceClientController::class, 'sauvgarder_contacte'])->name('sauvgarder_contacte');
            });
        });
        //Tous ce qui consiste directement à un utilisateur
        Route::prefix('/Utilisateur')->name('ProfilUtilisateur.')->group( function () {
            //Profil d'un utilisateur
            Route::get('/Mon-profil', [UtilisateurController::class, 'voir_profil'])->name('voir_profil');
            //permet à l'utilisateur de modifier ses inforamtions
            Route::get('/Parametre-de-mon-compte', [UtilisateurController::class, 'modification_dun_compte'])->name('modification_dun_compte');
            //Sauvegarder une modification
            Route::put('/Mis-a-jour-des-information/Z-857-saz-79n', [UtilisateurController::class, 'sauvgarder_une_modification_dun_compte'])->name('sauvgarder_une_modification_dun_compte');
            //Permet de modifier le compte bancaire de l'utilisateur
            Route::get('/Banque-swapZ59/Mon-compte-bancaire/{nombre}', [UtilisateurController::class, 'modifier_parametre_compte_bancaire'])->name('modifier_parametre_compte_bancaire');
            //Sauvgarder les informations sur la banque
            Route::put('/Banque-z25SauvgarderModification-N000000001/Utilisateur', [UtilisateurController::class, 'sauvgarder_modification_compte_bancaire'])->name('sauvgarder_modification_compte_bancaire');
            //Modification du mots de passe de l'utilisateur
            Route::get('/Modif-z87-58dx/Utilisateur-personnelle-754/Banque-d58', [UtilisateurController::class, 'modification_mots_passe'])->name('modification_mots_passe');
        });
        //Compte bancaire en generale d'un utilisateur
        Route::prefix('/Espace-personnel')->name('EspacePersonnel.')->group( function () {
            //information dans une compte bancaire
            Route::get('/Moi', [UtilisateurController::class, 'information_sur_mon_compte'])->name('information_sur_mon_compte');
            //historique des transaction fait par l'utilisateur
            Route::get('/Mes-historique-bancaire', [UtilisateurController::class, 'historique_sur_mon_compte'])->name('historique_sur_mon_compte');
            //Route pour voir les détails des transaction
            Route::get('/details-des-transaction/N-az89{id}s4-5489saze/{ref}', [UtilisateurController::class, 'detail_transaction'])->name('detail_transaction');
            //Déposer de l'argent dans mon compte
            Route::get('/Dépots-mobileMoney', [UtilisateurController::class, 'deposer_argent'])->name('deposer_argent');
            //Sauvgarder du dépots d'argent
            Route::post('/Dépots-mobileMoney', [UtilisateurController::class, 'sauvgarder_depot_argent'])->name('sauvgarder_depot_argent');
            //retirer de l'argent
            Route::get('/Retirer-de-l-argent/Serie2024-t-8000', [UtilisateurController::class, 'vue_pour_retirer_argent'])->name('vue_pour_retirer_argent');
            //retirer de l'argent active
            Route::post('/Retirer-de-l-argent/Serie2024-t-8000', [UtilisateurController::class, 'retirer_argent'])->name('retirer_argent');
            //Statistique
            Route::get('/Statistique-de-mon-compte-bancaire',[UtilisateurController::class, 'statistique_compte_bancaire'])->name('statistique_compte_bancaire');
            //Permet le transfet d'argent
            Route::get('/Transfert', [UtilisateurController::class, 'vue_transfert'])->name('vue_transfert');
            //Envoyer de l'argent
            Route::post('/Transfert', [UtilisateurController::class, 'transfert_simple'])->name('transfert_simple');
        });

    });
    //Route pour la partie administration de la banque
    Route::prefix('/Administration-Banque')->middleware('checkUserRole')->name('Administration.')->group( function () {
        //Pour la tableau de bord
        Route::get('/', [BanqueController::class, 'index'])->name('tableau_de_bord');

        //Route pour la modification des profiles de l'utilisateur
        Route::prefix('/Mon-profil')->name('Profile.')->group( function () {
            //Permet de voir un compte
            Route::get('/', [AdministrationControlleur::class, 'voir_compte'])->name('voir_compte');
            //Permet de modifier le profil d'un utilisateur connecter
            Route::get('/Parametre-de-mon-compte', [AdministrationControlleur::class,'modification_parametre_compte'])->name('modification_parametre_compte');
            //Permet de sauvgarder les modifications fait par l'utilisateur
            Route::get('/Inf-utilisateur', [AdministrationControlleur::class, 'modification_info_personnelle'])->name('modification_info_personnelle');
            Route::put('/Inf-utilisateur', [AdministrationControlleur::class, 'sauvgarder_une_modification_dun_admin_compte'])->name('sauvgarder_une_modification_dun_admin_compte');
            //Permet aux utilisateur de suprimer leurs comptes
            Route::delete('/Supression-compte-{chiffre}', [AdministrationControlleur::class, 'suprimer_compte'])->name('suprimer_compte');
        });
        //Route pour gérer diiverse publicité
        Route::prefix('/Globale')->name('Globale.')->group( function () {
            //publicités
            Route::prefix('/Publicite')->name('Publicite.')->group( function () {
                Route::get('/', [GlobaleControlleur::class, 'publiciter_liste'])->name('publiciter_liste');
                //creation
                Route::get('/Création-d-une-publicite', [GlobaleControlleur::class, 'publiciter_creer'])->name('publiciter_creer');
                Route::post('/Création-d-une-publicite', [GlobaleControlleur::class, 'publiciter_sauvgarder_creation'])->name('publiciter_sauvgarder_creation');
                //edition
                Route::get('/edition-d-une-publicite/564654{publiciteId}465464', [GlobaleControlleur::class, 'publiciter_edition'])->name('publiciter_edition');
                Route::put('/edition-d-une-publicite/564654{publiciteId}465464', [GlobaleControlleur::class, 'publiciter_edition_misajour'])->name('publiciter_edition_misajour');
                //Supression
                Route::delete('/Supression-sm54/564654{publiciteId}465464', [GlobaleControlleur::class, 'publiciter_supression_simple'])->name('publiciter_supression_simple');
                //forcer delete
                Route::delete('/Supression-direct-Z87543258479665/564654{publiciteId}465464', [GlobaleControlleur::class, 'publiciter_suprimer_directement'])->name('publiciter_suprimer_directement');
                //Poster  a publication
                Route::post('/poster-la-publication/644654{publiciteId}8975641', [GlobaleControlleur::class, 'publiciter_poster'])->name('publiciter_poster');
            });
        });
        //Pour l'ensemble de la gestion des compte
        Route::prefix('/Gestion-des-comptes')->name('GestionDesCompte.')->group( function () {
            //Liste
            Route::get('/liste-z7985',[GestionDesComptesControlleur::class, 'liste_compte'])->name('liste_compte');
            //Modification sur un compte
            Route::get('/compte-Z2{id}s-795-79', [GestionDesComptesControlleur::class, 'vue_sur_un_comptes'])->name('vue_sur_un_comptes');
            //Sauvgarde
            Route::put('/compte-8954{utilisateurId}5464-a56-2mol45-6bs', [GestionDesComptesControlleur::class, 'modifier_un_compte'])->name('modifier_un_compte');
            //Statistique globale
            Route::get('/Statistique-globale/Utilisateur', [GestionDesComptesControlleur::class, 'statistique_globale'])->name('statistique_globale');
        });
        //fin de la gestion des comptes

        //gestion des roles
        Route::prefix('/Gestion-des-role')->name('GestionDesRole.')->group( function () {
            //liste des rôles inscrit dans l'application
            Route::get('/', [GestionDesComptesControlleur::class, 'liste_role'])->name('liste_role');
        });
        //fin de la gestion des rôles
        //route pour l'ensemble des catégorie de compte dans la partie administration
        Route::prefix('/Categorie-de-compte')->name('CompteBancaireCategorie.')->group( function () {
            //retourne la vue principale
            Route::get('/', [CompteBancaireController::class, 'liste_categorie'])->name('liste_categorie');
            //retourne directement la vue de création GET et POST
            Route::get('/Creation-d-une-nouvelle-categorie-de-compte',[CompteBancaireController::class,'creation_categorie'])->name('creation_categorie');
            Route::post('/Creation-d-une-nouvelle-categorie-de-compte',[CompteBancaireController::class,'enregistrement_categorie'])->name('enregistrement_categorie');
            //Permet de modifier une catégorie de compte en particulier
            Route::get('/Modification-d-une-categorie-de-compte/Bz{id}58-Zu6V', [CompteBancaireController::class, 'modification_dune_categorie'])->name('modification_dune_categorie');
            Route::put('/Modification-d-une-categorie-de-compte/Bz{id}58-Zu6V', [CompteBancaireController::class, 'sauvgarder_la_modification'])->name('sauvgarder_la_modification');
            //Permet de suprimer (Mettre en corbeil les categorie de compte)
            Route::delete('/Suppression-d-une-categorie-de-compte/Z{id}-548', [CompteBancaireController::class,'suppression_simple'])->name('suppression_simple');
            //Permet de personnaliser un catégorie de compte en particulier
            Route::get('/Personalisation-de-Sz5{id}9-d-une-categorie-de-compte', [CompteBancaireController::class,'categorie_compte_personnalisable'])->name('categorie_compte_personnalisable');
            //Permet de sauvgarder une modification sur une catégorie de compte en particulier
            Route::put('/Personalisation-de-Sz5{id}9-d-une-categorie-de-compte', [CompteBancaireController::class,'sauvgarder_modification_compte_personnalisable'])->name('sauvgarder_modification_compte_personnalisable');
        });
        //Route pour gérer notre banque en générale
        Route::prefix('/Compte-Bancaire')->name('CompteBancaire.')->group( function () {
            //liste des comptes inscrite
            Route::get('/', [CompteBancaireController::class, 'liste_des_compte'])->name('liste_des_compte');
            //pour voir un compte bancaire en particulier
            Route::get('/identificationSmh7985{id}7bz8952-t610', [CompteBancaireController::class,'detail_sur_un_compte'])->name('detail_sur_un_compte');
            //Pour la mettre les nouveau compte en actif
            Route::put('/identificationSmh7985{id}7bz8952-t610', [CompteBancaireController::class,'activer_un_compte'])->name('activer_un_compte');
            //pour les status des compte bancaire
            Route::prefix('/Status-compte-bancaire')->name('StatusCompte.')->group( function () {
                //Récuperent tous les status des comptes en générale
                Route::get('/', [CompteBancaireController::class, 'liste_status_compte'])->name('liste_status_compte');
                //Suprimer un compte dans le corbeille virtuelle
                Route::delete('/B854-z{compteId}057', [CompteBancaireController::class, 'mettre_un_compte_inactif'])->name('mettre_un_compte_inactif');
                //Ajouter une nouvelle status de compte bancaire
                Route::get('/Ajouter-une-status-de-compte', [CompteBancaireController::class, 'creation_status_compte'])->name('creation_status_compte');
                //Sauvgarder les donner valider en post
                Route::post('/Ajouter-une-status-de-compte', [CompteBancaireController::class, 'sauvgarde_status_compte'])->name('sauvgarde_status_compte');
                //Pour modifier les données get et en post
                Route::get('/Modification-une-status-de-compte/Bi7{id}87z59', [CompteBancaireController::class, 'modification_status_compte'])->name('modification_status_compte');
                Route::put('/Modification-une-status-de-compte/Bi7{id}87z59', [CompteBancaireController::class, 'sauvgarde_modification_status_compte'])->name('sauvgarde_modification_status_compte');
                //Pour suprimer un status d'une compte
                Route::delete('/Modification-une-status-de-compte/Bi7{id}87z59', [CompteBancaireController::class, 'suprimer_status_compte'])->name('suprimer_status_compte');
                //Corbeille de compte bancaire
                Route::get('/corbeille-z8452-Ts', [CompteBancaireController::class,'corbeille'])->name('corbeille');
            });
            //Statistique des comptes bancaires
            Route::prefix('/Statistique')->name('Statistique.')->group( function () {
                //page d'acceuille simple
                Route::get('/', [CompteBancaireController::class,'statistique'])->name('index');
            });
        });
        //Route pour les service client de la banque
        Route::prefix('/ServiceClient')->name('ServiceClient.')->group( function () {
            route::get('/', [ServiceClientController::class,'message_recu'])->name('message_recu');
            Route::get('/Message-recu-z5468{messageId}z87546', [ServiceClientController::class,'voir_message_recu'])->name('voir_message_recu');
        });
    });
});
