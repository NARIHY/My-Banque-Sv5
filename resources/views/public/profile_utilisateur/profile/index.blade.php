@extends('client')

@section('titre', 'Mon profile')

@php
$date_daniversaire = new \Core\Date\DateFormaterFr($utilisateur->birthday);
$anniversaire_fr = $date_daniversaire->formatage_simple_fr();
//creation de compte
$date_creation_compte = new \Core\Date\DateFormaterFr($utilisateur->created_at);
$creation_compte = $date_creation_compte->formatage_simple_fr();
//Verification si l'utilisateur à un compte bancaire
$compte_bancaire = \App\Models\CompteBancaire::where('users_id', $utilisateur->id)
                                                ->orderBy('created_at', 'asc')
                                                ->limit(1)
                                                ->get();
$nombre = rand(1000000000,9999999999);
@endphp

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px; ">
            <div class="card-title">
                <div class="row mb-3">
                    <div class="col md-6 text-center">
                        <!-- Photo de l'utilisateur -->
                        @if (empty($utilisateur->picture))
                            <img src="{{asset('users-default/default.png')}}" alt="Profile" class="rounded-circle" style="width: 200px; height:200px; ">
                        @else
                            <img src="/storage/{{$utilisateur->picture}}" alt="Profile" class="rounded-circle" style="width: 200px; height:200px; ">
                        @endif
                    </div>
                    <div class="col md-6 text-center">
                        <h3> {{$utilisateur->last_name}} {{strtoupper($utilisateur->name)}} </h3>
                        <h5> {{$utilisateur->username}} </h5>
                        <div class="row mb-3">
                            <div class="col md-6" style="text-align: left">
                                <h6 style="text-decoration: underline">
                                    Status:
                                </h6>
                                <h6 style="text-decoration: underline">
                                    Addresse couriel:
                                </h6>
                                <h6 style="text-decoration: underline">
                                    Date d'anniversaire:
                                </h6>
                                <h6 style="text-decoration: underline">
                                    Début d'activité:
                                </h6>
                            </div>
                            <div class="col md-6" style="text-align: left">
                                <h6>
                                    {{$utilisateur->role->title}}
                                </h6>
                                <h6 style="color: red">
                                    {{$utilisateur->email}}
                                </h6>
                                <h6>
                                    {{$anniversaire_fr}}
                                </h6>
                                <h6>
                                    {{$creation_compte}}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4>
                    Mon compte bancaire:
                </h4>
                <div>
                    @forelse ($compte_bancaire as $compte)
                        <div class="table-responsive">
                            <table class="table table-dark table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center; color:brown">#</th>
                                        <th scope="col" style="text-align: center; color:brown">CIN</th>
                                        <th scope="col" style="text-align: center; color:brown">Numero de compte</th>
                                        <th scope="col" style="text-align: center; color:brown">Catégorie de compte</th>
                                        <th scope="col" style="text-align: center; color:brown">Addresse</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" style="text-align: center">{{$compte->id}}</th>
                                        <td  style="text-align: center">
                                            @php
                                                $chiffre = new \Core\Chiffre\BaseChiffre($compte->cin, 3);
                                                $numero_compte = new \Core\Chiffre\BaseChiffre($compte->numero_compte, 4);
                                            @endphp
                                            {{$chiffre->espacement()}}
                                        </td>
                                        <td style="text-align: center">
                                            {{$numero_compte->espacement()}}
                                        </td>
                                        <td style="text-align: center">
                                            {{$compte->compteBancaireCategorie->nomCategorie}}
                                        </td>
                                        <td style="text-align: center"> {{$compte->addresse}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <h5>Désoler, vous n'avez pas de compte bancaire pour le moment...</h5>
                    @endforelse
                </div>
                <h5>Modifier les paramètre:</h5>
                <div class="row mb-3 text-center">
                    <div class="col md-4">
                        <a href="{{route('Connecter.Client.ProfilUtilisateur.modification_dun_compte')}}" class="nav-link" style="text-decoration: underline; color:blue">de mon compte</a>
                    </div>
                    <div class="col md-4">
                        <a href="{{route('Connecter.Client.ProfilUtilisateur.modifier_parametre_compte_bancaire', ['nombre' => $nombre . $nombre . $nombre])}}" class="nav-link" style="text-decoration: underline; color:blue">sur mon compte bancaire</a>
                    </div>
                    <div class="col md-4">
                        <a href="{{route('Connecter.Client.ProfilUtilisateur.modification_mots_passe')}}" class="nav-link" style="text-decoration: underline; color:blue">Modifier mon mots de passe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
