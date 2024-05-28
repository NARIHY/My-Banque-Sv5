@extends('super-admin')
@php
    $titre = "";
    if(request()->routeIS('Connecter.Administration.CompteBancaireCategorie.creation_categorie')){
        $titre = 'Ajouter une nouvelle catégorie de compte';
    } else {
        $titre = 'Modifier une nouvelle catégorie de compte';
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
    @if (request()->routeIS('Connecter.Administration.CompteBancaireCategorie.creation_categorie'))
        <!-- formulaire qui permet de créer un catégorie de compte -->
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <!-- champ pour le nomCateg -->
            <label for="nomCategorie">Entrer le nom du catégorie de compte</label>
            <input type="text" name="nomCategorie" class="form-control" id="nomCategorie" value="{{@old('nomCategorie')}}">
            @error('nomCategorie')
                <p style="color: red">{{$message}}</p>
            @enderror
            <!-- champ pour le description -->
            <label for="description">Entrer une description pour la catégorie de compte</label>
            <textarea name="description" class="form-control" id="description" id="" cols="30" rows="10">
                {{@old('description')}}
            </textarea>
            @error('description')
                <p style="color: red">{{$message}}</p>
            @enderror
            <!-- champ pour le photo de couverture -->
            <label for="photo_couverture">Importer une photo de couverture</label>
            <input type="file" name="photo_couverture" id="photo_couverture" class="form-control">
            @error('photo_couverture')
                <p style="color: red">{{$message}}</p>
            @enderror
            <input type="submit" style="width: 100%; margin-top: 15px;" class="btn btn-primary" value="Enregistrer">
        </form>
    @else
    <!-- formulaire qui permet de modifier un catégorie de compte -->
    <form action="{{route('Connecter.Administration.CompteBancaireCategorie.sauvgarder_la_modification', ['id' => $categorie->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- champ pour le nomCateg -->
        <label for="nomCategorie">Entrer le nom du catégorie de compte</label>
        <input type="text" name="nomCategorie" class="form-control" id="nomCategorie" value="{{$categorie->nomCategorie}}">
        @error('nomCategorie')
            <p style="color: red">{{$message}}</p>
        @enderror
        <!-- champ pour le description -->
        <label for="description">Entrer une description pour la catégorie de compte</label>
        <textarea name="description" class="form-control" id="description" id="" cols="30" rows="10">
            {{$categorie->description}}
        </textarea>
        @error('description')
            <p style="color: red">{{$message}}</p>
        @enderror
        <!-- champ pour le photo de couverture -->
        <div class="row mb-3">
            <div class="col md-6">
                <label for="photo_couverture">Importer une photo de couverture</label>
                <input type="file" name="photo_couverture" id="photo_couverture" class="form-control">
                @error('photo_couverture')
                    <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <!-- Un probleme sur l'affichage du photo de couverture -->
            <div class="col md-6">
                <img width="100%" style="margin-top: 6px" src="/storage/{{$categorie->photo_couverture}}" alt="">
            </div>
        </div>
        <input type="submit" style="width: 100%; margin-top: 15px;" class="btn btn-primary" value="Enregistrer la modification">
    </form>

    @endif
    <!--
    <script src="{{asset('MonJs/compteCategorie.js')}}"></script>
    -->
@endsection
