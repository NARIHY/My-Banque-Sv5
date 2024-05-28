<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceClientContacteRequest;
use App\Models\ServiceClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class qui permet de gérer la partie service client
 * on vas éssayer de regrouper tous les parties de notre module de
 * gestion de service client dans ce controlleur
 * @author RANDRIANARISOA <maheninarandrianarisoa@gmail.com>
 * @copyright 2024 RANDRIANARISOA
 */
class ServiceClientController extends Controller
{
    //NOTICE: Méthode pour gérer les contactes directes des utilisateurs
    /**
     * Formulaire de contacte en GET, retourne une httpCode 200
     * aucune parametre nécéssaire
     * @return \Illuminate\View\View
     */
    public function nous_contactez(): View
    {
        return view($this->public_viewPath(). 'contacte.contacter_nous');
    }

    /**
     * Permet de sauvgarder les informations envoyer par l'utilisateur
     * en métant une relation 1-n sur l'envoye de message, un utilisateur peut
     * envoyer plusieur message dans une seule service
     * @param \App\Http\Requests\ServiceClientContacteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sauvgarder_contacte(ServiceClientContacteRequest $request): RedirectResponse
    {
        try {
            $donner = [
                'sujet_conversation' => $request->validated('sujet_conversation'),
                'introduction_lettre' => $request->validated('introduction_lettre'),
                'contenu_lettre' => $request->validated('contenu_lettre'),
                'conclusion_lettre' => $request->validated('conclusion_lettre'),
                'users_id' => Auth::user()->id,
            ];
            $contacteServiceClient = ServiceClient::create($donner);
            return redirect()->back()->with('succes', 'Merci, de nous avoir conactez. En vous répondras dès que possible.');
        } catch(\Exception $e) {
            return redirect()->back()->with('erreur', $e->getMessage());
        }
    }

    //NOTICE pour gérer les adlinistration simple

    /**
     * Liste tous les messages reçu
     * @return \Illuminate\View\View
     */
    public function message_recu(): View
    {
        $service_client = ServiceClient::orderBy('id','desc')
                                        ->where('status', '!=', '1')
                                        ->paginate(20);
        return view($this->admin_viewPath().'message_recu.message_recu', [
            'service_client' => $service_client
        ]);
    }

    /**
     * Permet de voir un message (en lecture seule)
     * On retourne l'id du service client qui lit le message
     * @param string $messageId l'identification du message à voir
     * @return \Illuminate\View\View
     */
    public function voir_message_recu(string $messageId): View
    {
        $message_recu = ServiceClient::findOrFail($messageId);
        $lecteur = [
            'status' => '1',
            'lecteur' => Auth::user()->id
        ];
        //petite verification
        if ($message_recu->status === '0') {
            //j'ajoute le lecteur dans la table
            $message_recu->update($lecteur);
        }
        return view($this->admin_viewPath().'message_recu.voirMessage', [
            'message' => $message_recu
        ]);
    }

    /**
     * Permet de répondre un méssage en particulier
     *
     * @return \Illuminate\View\View
     */
    public function repondre_message_recu(): View
    {
        return view($this->admin_viewPath().'message_recu.repondre.index');
    }

    /**
     * Dans cette méthode, on répond l'email d'un utilisateur
     * seule le lecteur du message peuvent répondre aux message des
     * utilisateur.
     * On vas créer un nouveau model MessageEnvoyer pour sauvgarder tous les
     * message envoyer par un administrateur
     *  Dans l'entite message envoyer on vas y mettre differente attribut comme:
     *                      - Introduction_lettre
     *                      - devellopement_lettre
     *                      - conclusion_lettre
     *                      - recepteur_email
     *                      - users_id (qui a envoyer le mail)
     *                      - timestamp
     * @return \Illuminate\Http\RedirectResponse
     */
    public function envoyer_message_utilisateur(): RedirectResponse
    {
        return redirect()->back()->with('','');
    }

    /**
     * Retourne directement en chemin d'une instance de route administration
     * @return string
     */
    private function admin_viewPath(): string
    {
        return "super-admin.service_client.";
    }
    /**
     * Retourne directement un chemin relatif en une instance
     * @return string
     */
    private function public_viewPath(): string
    {
        return "public.serviceClient.";
    }

    /**
     * Retourne directement une route en une instance pour faciliter l'appel
     * @return string
     */
    private function public_routes(): string
    {
        return "Connecter.Client.ServiceClient.";
    }

    /**
     * Retourne directement une route en une instance pour faciliter l'appel
     * @return string
     */
    private function admin_routes(): string
    {
        return "Connecter.Administration.ServiceClient.";
    }
}
