@extends('super-admin')

@section('title', 'Vue sur le compte de '. $compte_bancaire->users->name)

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item"> Compte Bancaire </li>
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.CompteBancaire.liste_des_compte')}}">Liste des comptes bancaire</a> </li>
            <li class="breadcrumb-item active"> {{$compte_bancaire->users->name}} {{$compte_bancaire->users->last_name}}</li>
        </ol>
        </nav>
    </div>
@endsection
@php
//j'njecte le numéro de compte dans un tableau, j'utilise str_split
$tableau = str_split($compte_bancaire->numero_compte, 4);
//On vas imploder le tableau
$tableau_imploder = implode(' ', $tableau);
//je vais aussi spliter le cin
$cin = str_split($compte_bancaire->cin, 3);
//On vas imploder ce tableau
$cin_imploder = implode(' ', $cin);
//récupération de la date d'anniversaire
$date = new \Core\Date\DateFormaterFr($compte_bancaire->users->birthday);
$date_formater = $date->formatage_simple_fr();


@endphp

@section('content')
    <div class="container">
        <div class="card" style="padding: 10px">
            <div class="card-title">

                <h3 style="text-align: center">Détaille sur le compte numéro {{$tableau[1]}} </h3>
            </div>
            <div class="card-body">
                <img src="{{asset('users-default/sary.jpg')}}" style="float: right" width="150px" alt="Izk-{{$compte_bancaire->users->username}}-85p">
                <!-- INFORMATION SUR LE CLIENT -->
                <div class="row mb-3">
                    <div class="col md-6">
                        <h5 style="text-decoration: underline; color: blue">Nom du propriétaire: </h5>
                        <h5 style="text-decoration: underline; color: blue">Prénon du propriétaire: </h5>
                        <h5 style="text-decoration: underline; color: blue">Localisation: </h5>
                        <h5 style="text-decoration: underline; color: blue">CIN: </h5>
                        <h5 style="text-decoration: underline; color: blue">Couriel: </h5>
                        <h5 style="text-decoration: underline; color: blue">Catégorie de compte: </h5>
                        <h5 style="text-decoration: underline; color: blue">Numéro de compte: </h5>
                        <h5 style="text-decoration: underline; color: blue">Status: </h5>
                    </div>
                    <div class="col md-6">
                        <h5> {{$compte_bancaire->users->name}} </h5>
                        <h5> {{$compte_bancaire->users->last_name}} </h5>
                        <h5> {{$compte_bancaire->addresse}}</h5>
                        <h5> {{$cin_imploder}} </h5>
                        <h5> {{$compte_bancaire->users->email}} </h5>
                        <h5> {{strtoupper($compte_bancaire->compteBancaireCategorie->nomCategorie)}}</h5>
                        <h5> {{$tableau_imploder}} </h5>
                        <h5> {{$compte_bancaire->statusCompte->titre}} </h5>
                    </div>
                </div>
                <!-- Pour les modifications partie administration -->
                <div class="row mb-3">
                    <div class="col md-6">
                        <p style="text-align: justify">
                            Pour les nouveaux compte, vous devriez cliquer sur le bouton activer pour activer
                            le compte du client. Mais si le status est autre que mise en ATTENTE, vous ne pouviez pas le remetre
                            à actif, s'est le systeme qui le gèrent, votre rôle est juste de cliquer sur le bouton vérifier
                        </p>
                        @if(session('succes'))
                            <p style="color: green">
                                {{session('succes')}}
                            </p>
                        @endif
                        @if(session('erreur'))
                            <p style="color: rgb(233, 31, 31)">
                                {{session('erreur')}}
                            </p>
                        @endif
                    </div>
                    <div class="col md-6  @if ($compte_bancaire->statusCompte->id !== 1) text-center @endif">
                        @if ($compte_bancaire->statusCompte->id === 1)
                            <div class="row mb-3 text-center">
                                <div class="col md-6">
                                    <form action="{{route('Connecter.Administration.CompteBancaire.activer_un_compte', ['id' => $compte_bancaire->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" value="Activer" class="btn btn-primary">
                                    </form>
                                </div>
                                <div class="col md-6">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="submit" value="Vérifier" class="btn btn-warning">
                                    </form>
                                </div>
                            </div>
                        @else
                            <form action="" method="post">
                                @csrf
                                <input type="submit" value="Vérifier" class="btn btn-warning">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
