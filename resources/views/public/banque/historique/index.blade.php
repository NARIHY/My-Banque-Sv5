@extends('client')

@section('titre', 'historique sur mon compte bancaire')

@php
//Argent
$argent = new \Core\Chiffre\BaseChiffre($compte_bancaire->solde, 3);
@endphp

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                <div class="card-title">
                    <h3>
                        Mon historique:
                    </h3>
                    <div class="row mb-3 text-center">
                        <div class="col md-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>
                                        Solde principale
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <h4><sup>MGA</sup> {{$argent->formatage_argent()}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col md-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>
                                        Solde débiter
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <h4><sup>MGA</sup> {{$debiteur}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col md-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>
                                        Solde créditer
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <h4><sup>MGA</sup> {{$crediteur}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3>Détail de mes transaction: </h3>
                    <div class="table-responsive">
                        <table class="table table-dark table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" style="color: yellow">#</th>
                                    <th scope="col" style="color: yellow">Débiteur</th>
                                    <th scope="col" style="color: yellow">Créditeur</th>
                                    <th scope="col" style="color: yellow">Montant</th>
                                    <th scope="col" style="color: yellow">Date</th>
                                    <th scope="col" style="color: yellow">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaction_reference as $transaction)
                                @php
                                    //Argent
                                    $arg = new \Core\Chiffre\BaseChiffre($transaction->montant, 3);
                                    //debiteur
                                    $debit = new \Core\Chiffre\BaseChiffre($transaction->expediteur_argent, 4);
                                    //expediteur
                                    $credit = new \Core\Chiffre\BaseChiffre($transaction->destinataire_argent, 4);
                                    //date
                                    $date_fr = new \Core\Date\DateFormaterFr($transaction->created_at);
                                @endphp
                                    <tr>
                                        <th scope="row" style="color: yellow">
                                            {{$transaction->id}}
                                        </th>
                                        <td>
                                            {{$debit->espacement()}} <b style="color: green">(Vous)</b>
                                        </td>
                                        <td>
                                            {{$credit->espacement()}}
                                        </td>
                                        <td>
                                            {{$arg->formatage_argent()}} MGA
                                        </td>
                                        <td>
                                            {{$date_fr->formatage_simple_fr()}}
                                        </td>
                                        <td>
                                            <a href="{{route('Connecter.Client.EspacePersonnel.detail_transaction', ['id' =>$transaction->id, 'ref' => $transaction->transaction_reference])}}" class="btn btn-primary">
                                                Voir +
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td> Vous n'avez pas encore fait de transaction pour le moment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$transaction_reference->links()}}
                    </div>
                </div>
        </div>
    </div>
@endsection
