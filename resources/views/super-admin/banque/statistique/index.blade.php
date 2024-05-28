@extends('super-admin')

@section('title', 'Statistique')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Statistique</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item active">acceuil</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
   <div class="row mb-3">
        <div class="col md-3">
            <div class="card" style="padding: 10px">
                <div class="card-title text-center">
                    <h4>Catégorie de compte</h4>
                </div>
                <div class="card-body text-center">
                    <h4>
                        {{$categorie}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col md-3">
            <div class="card" style="padding: 10px">
                <div class="card-title text-center">
                    <h4>Totale des comptes:</h4>
                </div>
                <div class="card-body text-center">
                    <h4>
                        {{$compte_bancaire}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col md-3">
            <div class="card" style="padding: 10px">
                <div class="card-title text-center">
                    <h4>Corbeille</h4>
                </div>
                <div class="card-body text-center">
                    <h4>
                        {{$corbeille}}
                    </h4>
                </div>
            </div>
        </div>
   </div>
   <div class="row mb-3">
        <div class="col md-3">
            <div class="card">
                <div class="card-title text-center">
                    <h4>Solde</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col md-3">
            <div class="card">
                <div class="card-title text-center">
                    <h4>Solde</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col md-3">
            <div class="card">
                <div class="card-title text-center">
                    <h4>Solde</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
   </div>
</div>
@endsection
