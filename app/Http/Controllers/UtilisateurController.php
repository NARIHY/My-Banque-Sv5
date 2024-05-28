<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositeMobileMoneyRequest;
use App\Http\Requests\MisAjourCompteBancairePersoRequest;
use App\Http\Requests\ModificationCompteUtilisateurRequest;
use App\Http\Requests\RetraitArgentUtilisateurRequest;
use App\Http\Requests\TransfertSimpleRequest;
use App\Models\User;
use App\Models\CompteBancaire;
use App\Models\CompteBancaireCategorie;
use App\Models\Deposite;
use App\Models\TransactionReference;
use App\Notifications\TransfertSimpleNotification;
use Core\Banque\GestionDeCompte;
use Core\Chiffre\VerificationNumero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * Cette classe permet à nos utilisateur de faire tous les actions
 * nécéssaire à leurs compte.
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class UtilisateurController extends Controller
{

    //Notice pour la gestion des compte Banquaire d'un utilisateur uniquement

    /**
     * Effectue les transfert d'argent d'un simple utilisateur à une autre utilisateur
     *
     * @param TransfertSimpleRequest $request
     * @return RedirectResponse
     */
    public function transfert_simple(TransfertSimpleRequest $request): RedirectResponse
    {
        $donner = $request->validated();
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        try {
            // Vérifier si l'ancien code secret correspond au code secret de l'utilisateur
            if (!Hash::check($request->validated('code_secret'), $compte_bancaire->code_secret)) {
                return redirect()->back()->with('erreur', 'Votre code secret est incorrecte, veuillez rééseiller avec le bon code secret.');
            }
            // Virifier le numero de compte avant toute chose
            if($compte_bancaire->numero_compte === "00000000000000") {
                return redirect()->back()->with('erreur','Compte bancaire inconnue');
            }
            //l'utilisateur ne doit pas transferer son propres argent vers lui même
            if($compte_bancaire->numero_compte === $request->validated('destinataire_argent')) {
                return redirect()->back()->with('erreur','Vous ne pouvez pas transferer votre propre argent dans votre compte');
            }
            //sauvgarder du transfert
            $transfert = new GestionDeCompte($compte_bancaire->numero_compte);
            $transfert->effectuerVirement($donner);
            if($transfert->effectuerVirement($donner) !== true) {
                return redirect()->back()->with('erreur','Une erreur c\'est survenue lors du transfert, veuillez contactez les service client');
            }
            // //Pour la notification
            // $notification = new TransfertSimpleNotification($donner);
            // $notification->
            // Auth::user()->notify($notification);
            return redirect()->back()->with('succes','Félicitation, votre transfert c\'est dérouler avec succès.');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur','Une erreur c\'est survenue lors du transfert, veuillez contactez les service client');
        }
    }

    /**
     * Vue qui permet à l'utilisateur  de transferer de l'argent
     * vers un autre utilisateur
     *
     * @return View
     */
    public function vue_transfert(): View
    {
        return view($this->viewPathBanque().'argent.virement.index');
    }
    /**
     * Retourne le statistique personnelle du compte de l'utilisateur
     * Essayez d'integrer une chart graphique pour montrer les dépense fait par le
     * client, en plus il faut activer l'épargne anuelle du compte bancaire de l'utilisateur,
     * du genre, créer un script qui s'auto actualise.
     * Je vais injecter des élément de livewire dans cette partie du site
     *
     * @return \Illuminate\View\View
     */
    public function statistique_compte_bancaire(): View
    {
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();

        return view($this->viewPathBanque().'statistique.index');
    }
    /**
     * Rendre vers la vue pour retirer de l'argent
     *
     * @return \Illuminate\View\view
     */
    public function vue_pour_retirer_argent(): View
    {
        return view($this->viewPathBanque().'argent.retirer.index');
    }

    /**
     * Permet aux utilisateur de retirer de l'argent en ligne, dans leur numéro
     * de téléphone
     *
     * @param RetraitArgentUtilisateurRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function retirer_argent(RetraitArgentUtilisateurRequest $request): RedirectResponse
    {
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        $retrait = new GestionDeCompte($compte_bancaire->numero_compte);
        $montant = $request->validated('montant');
        $telephone = $request->validated('telephone');
        try {
            // Vérifier si l'ancien code secret correspond au code secret de l'utilisateur
            if (!Hash::check($request->validated('code_secret'), $compte_bancaire->code_secret)) {
                return redirect()->back()->with('erreur', 'Votre code secret est incorrecte, veuillez rééseiller avec le bon code secret.');
            }
            $retirer_argent = $retrait->retirer($montant, $telephone);
            if($retirer_argent !== true) {
                return redirect()->back()->with('erreur','Désolé, il y a eu une erreur lors du transfert');
            }
            return redirect()->back()->with('succes','Félicitation, le retrait c\'est très bien passer.');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur','Désolé, il y a eu une erreur lors du transfert'.$e->getMessage());
        }
    }
    /**
     * Permet de faire un dépot dans un compte, On a besoin du compte de l'utilisateur,
     * on l'injectent dans la table Deposite // Deposite === Somme solde des l'utilisateur qui possedent un compte
     * bancaire
     *
     * @param \App\Http\Requests\DepositeMobileMoneyRequest; $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarder_depot_argent(DepositeMobileMoneyRequest $request): RedirectResponse
    {
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        $montant = $request->validated('montant');
        $telephone = $request->validated('telephone');
        $verification_numero = new VerificationNumero();
        if($verification_numero::verifierNumero($telephone) !== true) {
            return redirect()->back()->with('erreur','Désoler, le numéro que vous nous aviez envoyer n\'existe pas.');
        }
        try {
            $reference = uuid_create();
            $donner_valider = [
                'telephone' => $telephone,
                'numero_compte' => $compte_bancaire->numero_compte,
                'montant' => $montant,
                'reference' => $reference,
                'description' => 'depot dans le compte bancaire'
            ];
            //Si créer on vas mettre à jour le solde de l'utilisateur
            $ajouter_solde = new GestionDeCompte($compte_bancaire->numero_compte);
            //déposer le solde dans le compte bancaire de l'utilisateur
            $ajouter_solde->deposer($montant, $compte_bancaire->id);
            if($ajouter_solde->deposer($montant, $compte_bancaire->id) !== true) {
                return redirect()->back()->with('erreur','Désoler, il y a eu une erreur lors du dépots. Veuillez rééseiller plus tard.');
            }
            $deposite = Deposite::create($donner_valider);
            return redirect()->back()->with('succes','Félicitations ! Vous avez maintenant effectué avec succès un dépôt d\'argent sur votre compte bancaire. Si vous avez des questions ou des préoccupations, n\'hésitez pas à contacter votre banque pour obtenir de l\'aide supplémentaire.');
        } catch (\Exception $e) {
            return redirect()->back()->with('erreur','Désoler, il y a eu une erreur lors du dépots. Veuillez rééseiller plus tard.');
        }
    }
    /**
     * On a besoin d'une mobile money pour pouvoir activer cette fonctionnalité
     * Mais pour survenir à cette petit légér problème, je vais éssayer de faire comme s'il y avait
     * une mobile money
     *
     * @return \Illuminate\View\View
     */
    public function deposer_argent(): View
    {
        return view($this->viewPathBanque().'argent.deposer.index');
    }

    /**
     * Retourne une message pour voir la détails des transaction
     * fait. Ce sont des messages qui fait référence aux détaille des
     * action fait par l'utilisateur
     * @param string $id identification de la reference
     *
     * @return \Illuminate\View\View
     */
    public function detail_transaction(string $id): View
    {
        $transaction_reference = TransactionReference::findOrFail($id);
        return view($this->viewPathBanque().'historique.vue_sur_detail_transaction.vue', [
            'transaction_reference' => $transaction_reference
        ]);
    }
    /**
     * On liste ici le solde du client, et tous ses historique global
     * Permet aux client de voir tous les actions qu'il/elle a fait
     *
     * @return \Illuminate\View\View
     */
    public function historique_sur_mon_compte(): View
    {
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        /** @var TransactionReference $transaction_reference recup des historique de l'utilisateur */
        $transaction_reference = TransactionReference::where('expediteur_argent', $compte_bancaire->numero_compte)
                                                            ->orderBy('created_at', 'desc')
                                                            ->paginate(15);
        $gestion_compte = new GestionDeCompte($compte_bancaire->numero_compte);
        return view($this->viewPathBanque().'historique.index', [
            'compte_bancaire' => $compte_bancaire,
            'transaction_reference' => $transaction_reference,
            'debiteur' => $gestion_compte->calculerSommeTotaleDesMontantsDebiteur(),
            'crediteur' => $gestion_compte->calculerSommeTotaleDesMontantCrediteur()
        ]);
    }

    /**
     * Permet de voir tous les informations dans le compte bancaire de l'utilisateur
     * Status / Solde / Référence / transaction / dépots / dépense
     * Epargne
     * On a besoin de l'utilisateur connecter pour l'informer tous les règle et
     * engagement que nous faisons envers nos clients
     *
     * @return \Illuminate\View\View
     */
    public function information_sur_mon_compte(): View
    {
        /** @var User $utilisateur utilisateur qui est connecter */
        $utilisateur = Auth::user();
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        return view($this->viewPathBanque().'information.index', [
            'utilisateur' => $utilisateur,
            'compte_bancaire' => $compte_bancaire
        ]);
    }
    //Notice Pour les utilisateur en générale
    /**
     * Retourne la vue pour que l'utilisateur puisse modifier son
     * Mots de passe
     *
     * @return \Illuminate\View\View
     */
    public function modification_mots_passe(): View
    {
        return view($this->viewPath().'parametre.mots_de_passe.mdp');
    }

    /**
     * Sauvegarde les modifications apportées au compte bancaire de l'utilisateur.
     *  Nb: Une erreur peut être vu lorsque l'utilisateur possèdent plusieur compte bancaire
     * @param MisAjourCompteBancairePersoRequest $request La requête contenant les données validées.
     * @return \Illuminate\Http\RedirectResponse Redirige l'utilisateur vers la page précédente avec un message.
     */
    public function sauvgarder_modification_compte_bancaire(MisAjourCompteBancairePersoRequest $request): RedirectResponse
    {
        // Valider les données de la requête
        $validatedData = $request->validated();
        try {
            // Récupérer le compte bancaire de l'utilisateur
            $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
            // Vérifier si l'utilisateur a entré à la fois un ancien et un nouveau code secret
            if (isset($validatedData['ancien_code_secret']) && isset($validatedData['code_secret'])) {
                // Vérifier si l'ancien code secret correspond au code secret de l'utilisateur
                if (!Hash::check($validatedData['ancien_code_secret'], $compte_bancaire->code_secret)) {
                    return redirect()->back()->with('erreur', 'L\'ancien code secret que vous avez entré ne correspond à aucun compte dans notre base de données. Veuillez réessayer avec votre code secret actuel.');
                }
                // Mettre à jour les informations du compte bancaire avec le nouveau code secret hashé
                $compte_bancaire->update([
                    'addresse' => $validatedData['addresse'],
                    'compte_bancaire_categorie_id' => $validatedData['compte_bancaire_categorie_id'],
                    'code_secret' => Hash::make($validatedData['code_secret'])
                ]);
            } else {
                // Mettre à jour les informations du compte bancaire sans changer le code secret
                $compte_bancaire->update([
                    'addresse' => $validatedData['addresse'],
                    'compte_bancaire_categorie_id' => $validatedData['compte_bancaire_categorie_id'],
                ]);
            }
            return redirect()->back()->with('succes', 'Modification de vos informations réussie.');
        } catch (\Exception $e) {
            return redirect()->back()->with('erreur', 'Une erreur s\'est produite lors de la modification des informations du compte bancaire.'.$e->getMessage());
        }
    }



    /**
     * Redirerige l'utilisateur dans la vue de modification des informations
     * pour son compte banquaire. On affiche pas ici les document que l'utilisateur nous
     * a envoyez.
     *
     * @return \Illuminate\View\View
     */
    public function modifier_parametre_compte_bancaire(): View
    {
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        $categorie_compte = CompteBancaireCategorie::orderBy('created_at', 'asc')
                                                        ->pluck('id','nomCategorie');
        return view($this->viewPath().'parametre.banque.compte', [
            'compte_bancaire' => $compte_bancaire,
            'categorie_compte' => $categorie_compte
        ]);
    }

    /**
     * Permet de sauvgarder les données entrer par l'utilisateur
     * lors des mis à jours de ces informations
     * Nb: Si l'utilisateur change sont email il doit reconfirmer son compte
     * @param \App\Http\Requests\ModificationCompteUtilisateurRequest $request
     * @return RedirectResponse
     */
    public function sauvgarder_une_modification_dun_compte(ModificationCompteUtilisateurRequest $request): RedirectResponse
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
     * Permet à l'utilisateur connecter de modifier les
     * information sur son propre compte
     *
     * @return \Illuminate\View\View
     */
    public function modification_dun_compte(): View
    {
        /** @var \Illuminate\Support\Facades\Auth $utilisateur une instance d'un utilisateur connecter */
        $utilisateur = Auth::user();
        return view($this->viewPath().'parametre.utilisateur.compte', [
            'utilisateur' => $utilisateur
        ]);
    }

    /**
     * Ne fait rien, elle retourne juste un utilisateur qui est connecter
     * et le renvoye vers la page profil d'un utilisateur
     * @return \Illuminate\View\View
     */
    public function voir_profil(): View
    {
        /** @var \Illuminate\Support\Facades\Auth $utilisateur une instance d'un utilisateur connecter */
        $utilisateur = Auth::user();
        return view($this->viewPath().'profile.index', [
            'utilisateur'=> $utilisateur
        ]);
    }


    /**
     * Retourn le chemin de vue dans la gestion des banque
     *
     * @return string
     */
    private function viewPathBanque(): string
    {
        return "public.banque.";
    }
    /**
     * Retourne une instance de la chemin de vue en relatif
     * Nécéssaire pour avoir une meilleure architecture des code
     * @return string
     */
    private function viewPath(): string
    {
        return "public.profile_utilisateur.";
    }

    /**
     * Retourne une instance du routee en relatif
     * Nécéssaire pour avoir une meilleure architecture des code
     * @return string
     */
    private function routes(): string
    {
        return "Connecter.Client.ProfilUtilisateur.";
    }
}
