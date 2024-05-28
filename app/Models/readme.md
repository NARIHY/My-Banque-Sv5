------------------------------------------------Important pour la phase de dévéloppement et maintenance-----------------------------------------------

* Chaque modèle représente une entité dans la base de donnée et ses modèle sont relié entre eux du genre 1-n | 1-1 | n-n

Chaque chose qui doit-être fait avec nos modèle doivent être fait ici

****************************************************************************

            **************************************************
            *                 COMPTE BANCAIRE                *
            **************************************************

CompteBancaire est le modèle qui représente l'entite des comptes bancaire des utilisateurs, elles est relier directement avec le modèle utilisateur car la règle est un utilisateur ne doit possèder qu'une seule compte bancaire et il y a des catégory de compte pour chaque compte bancaire

1) Pour débuter on vas commencer par 3 catégorie de compte:
-   ANTSO (Compte bancaire gratuit)
-   MIHARY (Compte bancaire simple)
-   MAHERY (Compte Prénium)
-   LAFATRA (Compte Vip)

    ----------------x---------------
Dans les catégorie de compte il y a:
    - identification x
    - nomCategorie x
    - date de création x
    - nombre de personne qui est abonné x
    - description du categorie de compte
    - image

On vas ajouter un blog qui permet de bloguer, le blog est dans une autre module d'application
-*- D'après mes recherche, c'est élément ne sont qu'utile qu'aux affichage des différents types de catégorie de compte -*-
Mais pour mieux étudier ça, j'ai procéder à ajouter de nouvelle élément dans l'entité catégorie de compte comme:
    - Tarif
    - Taux
    - id de l'utilisateur qui a modifier ou a suprimer une information sur une catégorie de compte
    - etc...
(A étudier de très près)
La question a posé ici est que fait la banque

                ***********************************************
                *  Important, je doit m'ewercer sur les date  *
                *  et les heures                              *
                ***********************************************

Tout est fini sur la composition des type de catégorie de compte bancaire,
Maintenant il ne reste plus qu'a relier CompteBancaireCategorie::class à CompteBancaire
** J'ai fini de créer tous les fonctionnalité optimale lors de la création d'une compte bancaire Maintenant on vas gérer la liste des comptes inscrite.
On vas créez une  nouvelle entité qui est le status d'un compte:
    Il existe deux type différent de status:
        - Le status d'un compte bancaire: (Relier en 1-n avec le compte bancaire)
            dans cette partie on y ajoute seulement tous les status basique que possèdent un compte bancaire comme:
                - Actif
                - Desactiver
                - Blocker
        -Le status d'une compte bancaire catégorie:
            dans cette partie on y ajoute le status actuel d'une catégorie de compte bancaire comme:
                - En maintenance
                - Actif
                - Obselette

                ---------------- Notice très important ------------------
                |   Résolution du problème avec les relation 1-n        |
                |   Voici le règle pour qu'une relation 1-n fonctionne: |
                |       nomTable_id (foreignId et cascade on delete)    |
                |                                                       |
                ---------------------------------------------------------

Maintenant il reste à corriger les bug dans la partie Création de compte bancaire pour un utilisateur
Je devrait mieux étudier la partie interface utilisateur et des règle
J'ai ajoutez une nouvelle relation 1-n dans le compte_bancaire pour que ces status soit lier directement entre a un compte bancaire

x Reste beaucoup de chose à faire mais je vais continuer vers le module service client de notre application


****************************************************************************

        **************************************************
        *                 SERVICE CLIENT                 *
        **************************************************

Dans la partie du plateforme service client, on vas essayer de mieux créer la relation entre un client et notre banque. Je n'ai pas beaucoup d'inspiration pour le moment mais que ce qui est sur c'est ce que le client doit-être roi.
Je vais créer une entité ServiceClient avec le migration adéquât comme:
    - l'id de utilisateur (En Foreign Key)
    - le sujet de conversation
    - une champ d'introduction pour la lettre
    - une champ contenu de la lettre pour que l'utilisateur puissent s'exprimer
    - une champ conclusion et remerciement pour que l'utilisateur puisse remercier et conclure sont sujet de conversation

Chaque lettre de contact est addressé à la fausse addresse email: mabanque.serviceClient@narihy.mg.

dans la partie interface, l'utilisateur à droit de chattez directement avec notre service client,
- Pour le chat, Je vais créer une nouvelle entité ServiceClientChat.
Pour ce chat, j'ai vais la créer avec laravel livewire ou laravel echo, je ne sais pas encore, mais pour avoir une réponse dynamique, j'ai besoin de javascript, peut-être que je vais le créer sous forme de api rest.

Dans l'entité chat, on trouve:
    - User_id(Id de l'utilisateur client)
    - Service_client_employers_id(Id de l'utilisateur du service client qui le reçoit)
    - Message du client
    - Message de l'employer
    - etc (On peut ajouter divers autre propos ou l'amoindrire)
     
    -----------------------------------------------------------------
    |    On a besoin de lister les utilisateur qui travaille dans   |
    |    le service client dans une autre entité                    |
    |---------------------------------------------------------------|


Role = Client, Employer, Secretaire, (tous les poste disponible dans une banque); 
Je vais aussi ajoutez une gestion de parking pour les employés qui on les rôle de veillez sur les véhicules de nos client.









--------------------------------------------------------------------------
Un I-laharana, avec du voix pour respecter les personnes qui sont arriver en premier lorsque la banque soit finaliser.


--------------------------------------------------------------------------

            -----------------------------------------------------------
            | Bug important sur l'inscription dans un compte bancaire |
            -----------------------------------------------------------
!!Important
Ajouter une systeme de supression de compte
    ajouter dans users:
        - suprimer: boolean 1-0
        - default 0
    +middleware de garde
