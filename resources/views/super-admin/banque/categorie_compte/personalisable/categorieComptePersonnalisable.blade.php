@extends('super-admin')

@section('title', $categorie->nomCategorie)

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item">Personnalisation de</li>
            <li class="breadcrumb-item active">{{$categorie->nomCategorie}}</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
<h2 class="text-center">Veuillez remplir les informations suivants</h2>
@if (session('succes'))
    <div class="alert alert-success text-center">
        {{session('succes')}}
    </div>
@endif
@if (session('erreur'))
    <div class="alert alert-warning text-center">
        {{session('erreur')}}
    </div>
@endif
<form action="" method="post">
    @csrf
    @method('PUT')
    <label for="tarif">Tarif mensuel</label>
    <div class="input-group mb-3">
        <span class="input-group-text">MGA</span>
        <input type="number" name="tarif" min="5000" id="tarif" class="form-control" value="{{$categorie->tarif}}">
    </div>
    @error('tarif')
        <p style="color: red">
            {{$message}}
        </p>
    @enderror

    <label for="jour_douverture">Nombre de jour d'ouverture:</label>
    <div class="input-group mb-3">
        <span class="input-group-text">Jour</span>
        <input type="number" class="form-control" name="jour_douverture" id="jour_douverture" min="5" max="7" value="{{$categorie->jour_douverture}}">
    </div>
    @error('jour_douverture')
        <p style="color: red">
            {{$message}}
        </p>
    @enderror

    <label for="taux">Entrer le taux annuelle</label>
    <input type="number" name="taux" id="taux" class="form-control" value="{{number_format($categorie->taux, 2,'.')}}">
    @error('taux')
        <p style="color: red">
            {{$message}}
        </p>
    @enderror
    <div class="row mb-3">
        <div class="col md-6">
            <label for="heure_douverture">Heure d'ouverture:</label>
            <input type="time" name="heure_douverture" id="heure_douverture" class="form-control" value="{{$categorie->heure_douverture}}">
            @error('heure_douverture')
                <p style="color: red">
                    {{$message}}
                </p>
            @enderror
        </div>
        <div class="col md-6">
            <label for="heure_fermeture">Heure de fermeture:</label>
            <input type="time" name="heure_fermeture" id="heure_fermeture" class="form-control" value="{{$categorie->heure_fermeture}}">
            @error('heure_fermeture')
                <p style="color: red">
                    {{$message}}
                </p>
            @enderror
        </div>
    </div>
    <div style="margin-top: 15px; width: 100%">
        <input type="submit" value="Enregistrer" class="btn btn-primary" width="100%">
    </div>
</form>
@endsection
