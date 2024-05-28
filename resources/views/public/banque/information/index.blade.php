@extends('client')

@section('titre', 'Information sur mon compte bancaire')

@php
    //date d'anniverssaire en françait
    $date_fr = new \Core\Date\DateFormaterFr($compte_bancaire->users->birthday);
    //cin formater de l'utilisateur
    $cin = new \Core\Chiffre\BaseChiffre($compte_bancaire->cin, 3);
    //date d'inscription en françait
    $inscription = new \Core\Date\DateFormaterFr($compte_bancaire->created_at);
     //numero de compte formater de l'utilisateur
     $n_compte = new \Core\Chiffre\BaseChiffre($compte_bancaire->numero_compte, 4);
@endphp

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                <div class="card-title">
                    <h3 class="text-center">
                        Information sur mon compte
                    </h3>
                    <p style="text-align: justify">
                        Nous vous informons Madame, Mademoiselle, Monsieur {{$utilisateur->last_name}} {{strtoupper($utilisateur->name)}},
                        née le {{$date_fr->formatage_simple_fr()}}, agé de {{$date_fr->diffForHumans()}},se localise aux <b style="color: blue">{{$compte_bancaire->addresse}}</b>,
                        portant le numéro de carte d'identité nationale malagasy <b> {{$cin->espacement()}} </b>. Vous êtes inscrit chez nous le
                        {{$inscription->formatage_simple_fr()}} aux alentour de {{$inscription->recupération_heure()}}, avec le numéro de compte
                        <b>{{$n_compte->espacement()}}</b>. <br>
                        Nb: S'il vous plait, veuillez lire nos principe avant d'activer votre compte.
                    </p>
                </div>
                <div class="card-body">
                    <h3 class="text-center" style="color:grey">
                        Conditions Générales d'Utilisation pour notre Banque Virtuelle
                    </h3>
                    <p style="text-align: justify">
                        Bienvenue dans notre banque virtuelle ! Avant de commencer à explorer toutes les fonctionnalités passionnantes que nous avons à offrir, prenons un moment pour passer en revue nos Conditions Générales d'Utilisation (CGU) afin de garantir une expérience bancaire sécurisée et agréable pour vous et tous nos clients.
                    </p>
                    <ol>
                        <!-- 1 -->
                        <li style="text-decoration: underline; color:blue" >
                            Inscription et Accès au Compte :
                        </li>
                        <p style="text-align: justify">
                            Pour accéder à nos services bancaires en ligne, vous devez vous inscrire en fournissant des informations personnelles exactes et à jour. Vous serez responsable de la confidentialité de vos informations d'identification et de la sécurité de votre compte.
                        </p>
                         <!-- 2 -->
                        <li style="text-decoration: underline; color:blue" >
                            Utilisation des Services :
                        </li>
                         <p style="text-align: justify">
                            En utilisant nos services, vous acceptez de respecter toutes les lois et réglementations en vigueur. Vous êtes autorisé à utiliser nos services uniquement à des fins légales et légitimes.
                         </p>
                          <!-- 3 -->
                        <li style="text-decoration: underline; color:blue" >
                            Sécurité :
                        </li>
                        <p style="text-align: justify">
                            Nous mettons en place des mesures de sécurité robustes pour protéger vos informations personnelles et financières. Cependant, vous devez également prendre des précautions raisonnables pour protéger votre compte, telles que l'utilisation de mots de passe forts et la surveillance régulière des activités suspectes.
                        </p>
                         <!-- 4 -->
                         <li style="text-decoration: underline; color:blue" >
                            Transactions :
                        </li>
                         <p style="text-align: justify">
                            Vous pouvez effectuer diverses transactions, telles que des virements, des paiements de factures et des achats en ligne, à travers notre plateforme sécurisée. Assurez-vous de vérifier attentivement les détails de chaque transaction avant de les valider.
                         </p>
                          <!-- 5 -->
                        <li style="text-decoration: underline; color:blue" >
                            Frais et Tarifs :
                        </li>
                        <p style="text-align: justify">
                            Certains services peuvent être soumis à des frais et des tarifs. Ces frais seront clairement indiqués avant que vous ne confirmiez une transaction. Nous nous engageons à maintenir nos frais compétitifs et transparents.
                        </p>
                         <!-- 6 -->
                         <li style="text-decoration: underline; color:blue" >
                            Communication :
                        </li>
                         <p style="text-align: justify">
                            Nous vous informerons régulièrement des mises à jour importantes, des promotions et des offres spéciales par le biais de divers canaux de communication. Assurez-vous de consulter régulièrement vos messages pour rester informé.
                         </p>
                          <!-- 7 -->
                        <li style="text-decoration: underline; color:blue" >
                            Assistance Client :
                        </li>
                        <p style="text-align: justify">
                            Notre équipe d'assistance client est disponible pour répondre à toutes vos questions et préoccupations. N'hésitez pas à nous contacter par téléphone, par e-mail ou via notre service de chat en direct.
                        </p>
                         <!-- 8 -->
                         <li style="text-decoration: underline; color:blue" >
                            Respect de la Vie Privée :
                        </li>
                         <p style="text-align: justify">
                            Nous respectons votre vie privée et nous engageons à protéger vos données personnelles conformément à notre politique de confidentialité. Nous ne partagerons jamais vos informations avec des tiers sans votre consentement.
                         </p>
                    </ol>
                    <p style="text-align: justify">
                        En acceptant nos Conditions Générales d'Utilisation, vous reconnaissez avoir lu, compris et accepté toutes les conditions énoncées ci-dessus. Nous sommes ravis de vous accueillir dans notre communauté bancaire virtuelle et nous nous engageons à fournir des services de qualité supérieure pour répondre à tous vos besoins financiers. Merci de votre confiance et de votre collaboration.
                    </p>
                </div>
        </div>
    </div>
@endsection
