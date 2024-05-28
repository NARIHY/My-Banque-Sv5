@extends('super-admin')
@php
    $titre = "";
    if(request()->routeIS('Connecter.Administration.CompteBancaire.StatusCompte.creation_status_compte')){
        $titre = 'Ajouter une nouvelle status de compte';
    } else {
        $titre = 'Modifier le status de compte';
    }
@endphp
@section('title', $titre)

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
    @if (request()->routeIS('Connecter.Administration.CompteBancaire.StatusCompte.creation_status_compte'))
        <!-- formulaire qui permet de créer un catégorie de compte -->
        <form action="" method="post">
            @csrf
            <!-- champ pour le nomCateg -->
            <label for="titre">Entrer le nom du catégorie de compte</label>
            <input type="text" name="titre" class="form-control" id="nomCategorie" value="{{@old('titre')}}">
            @error('titre')
                <p style="color: red">{{$message}}</p>
            @enderror
            <input type="submit" style="width: 100%; margin-top: 15px;" class="btn btn-primary" value="Enregistrer">
        </form>
    @else
    <!-- formulaire qui permet de modifier un catégorie de compte -->
    <form action="{{route('Connecter.Administration.CompteBancaire.StatusCompte.sauvgarde_modification_status_compte',['id' => $status->id])}}" method="post">
        @csrf
        @method('PUT')
        <!-- champ pour le nomCateg -->
        <label for="titre">Entrer le nom du catégorie de compte</label>
        <input type="text" name="titre" class="form-control" id="nomCategorie" value="{{$status->titre}}">
        @error('titre')
            <p style="color: red">{{$message}}</p>
        @enderror

        <input type="submit" style="width: 100%; margin-top: 15px;" class="btn btn-primary" value="Enregistrer la modification">
    </form>

    @endif
    <!--
    <script src="{{asset('MonJs/compteCategorie.js')}}"></script>
    -->
@endsection
