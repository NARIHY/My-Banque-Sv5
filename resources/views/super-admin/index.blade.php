@extends('super-admin')

@section('title', 'Administration de la banque')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item active">Acceuil</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col md-6">
                <div class="card" style="padding: 10px">
                    <div class="card-title">
                        <h5>
                            Utilisateur
                        </h5>
                    </div>
                    <div class="card-body">
                        <h5 style="text-align: right">
                            {{$utilisateur}}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col md-6">
                <div class="card" style="padding: 10px">
                    <div class="card-title">
                        <h5>
                            Compte bancaire
                        </h5
                    </div>
                    <div class="card-body">
                        <h5 style="text-align: right">
                            {{$compte_bancaire}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->
        <div class="row mb-3">
            <div class="col md-6">
                <div class="card" style="padding: 10px">
                    <div class="card-title">
                        <h5>
                            Rôle
                        </h5>
                    </div>
                    <div class="card-body">
                        <h5 style="text-align: right">
                            {{$role}}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col md-6">
                <div class="card" style="padding: 10px">
                    <div class="card-title">
                        <h5>
                            Catégorie de compte
                        </h5
                    </div>
                    <div class="card-body">
                        <h5 style="text-align: right">
                            {{$compte_bancaire_categorie}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->
        <div class="row mb-3">
            <div class="col md-6">
                <div class="card" style="padding: 10px">
                    <div class="card-title">
                        <h5>
                            Contacte reçu
                        </h5>
                    </div>
                    <div class="card-body">
                        <h5 style="text-align: right">
                            {{$service_client}}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col md-6">
                <div class="card" style="padding: 10px">
                    <div class="card-title">
                        <h5>
                            Publicité envoyer
                        </h5
                    </div>
                    <div class="card-body">
                        <h5 style="text-align: right">
                            {{$publiciter}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
