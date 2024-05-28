@extends('client')

@section('titre', 'Information sur une transaction')

@php
//Argent
$arg = new \Core\Chiffre\BaseChiffre($transaction_reference->montant, 3);
//debiteur
$debit = new \Core\Chiffre\BaseChiffre($transaction_reference->expediteur_argent, 4);
//expediteur
$credit = new \Core\Chiffre\BaseChiffre($transaction_reference->destinataire_argent, 4);
//date
$date_fr = new \Core\Date\DateFormaterFr($transaction_reference->created_at);

//frais
$frais = new \Core\Banque\GestionDeCompte($transaction_reference->expediteur_argent);
@endphp

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                <div class="card-title">
                    <h3 style="color:grey" class="text-center">
                        transaction n*: {{str_pad($transaction_reference->id,10,'0',STR_PAD_LEFT)}}
                    </h3>
                </div>
                <div class="card-body">
                    <p style="text-align: justify">
                        @if($transaction_reference->taux_recuperer === '0') La @endif {{$transaction_reference->description_transfert}} pour la somme de {{$arg->formatage_argent()}} MGA, c'est dérouler avec succès.
                        Le frais du transfert de cette transaction que vous avez fait le {{$date_fr->formatage_simple_fr()}} aux alentour de {{$date_fr->recupération_heure()}} est resté à la somme de @if ($transaction_reference->taux_recuperer === '0')
                        {{$frais->frais_formater_transaction($transaction_reference->montant)}} MGA.
                        @else
                        {{$frais->recuperation_frais_virement($transaction_reference->id)}} MGA.
                        @endif
                        Débiteur: {{$debit->espacement()}}, créditeur: {{$credit->espacement()}}. Reférence de la transaction: {{$transaction_reference->transaction_reference}}
                    </p>
                </div>
        </div>
    </div>
@endsection
