@extends('super-admin')
@php
    $titre = "";
    if(request()->routeIS('Connecter.Administration.Globale.Publicite.publiciter_creer')){
        $titre = 'Ajouter une nouvelle publicités';
    } else {
        $titre = 'Modifier une publicités';
    }
@endphp
@section('title', $titre)

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item"> Publicités </li>
            <li class="breadcrumb-item active"> {{$titre}} </li>
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


    @if (request()->routeIS('Connecter.Administration.Globale.Publicite.publiciter_creer'))
        <div class="container">
            <div class="card">
                <div class="card-title">
                    <h3 class="text-center">{{$titre}}</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="titre">Ajouter un titre</label>
                        <input type="text" name="titre" id="titre" class="form-control" value="{{@old('titre')}}">
                        @error('titre')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="description_publicite">Description de la publicité</label>
                        <textarea name="description_publicite" id="description_publicite" class="form-control" cols="30" rows="10">
                            {{@old('description_publicite')}}
                        </textarea>
                        @error('description_publicite')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="media">Ajouter un contenu media</label>
                        <input type="file" name="media" id="media" class="form-control">
                        @error('media')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror

                        <input type="submit" value="Enregister" class="btn btn-primary" style="width: 100%; margin-top:20px">
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="card">
                <div class="card-title">
                    <h3 class="text-center">{{$titre}}</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="titre">Ajouter un titre</label>
                        <input type="text" name="titre" id="titre" class="form-control" value="{{$publiciter->titre}}">
                        @error('titre')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="description_publicite">Description de la publicité</label>
                        <textarea name="description_publicite" id="description_publicite" class="form-control" cols="30" rows="10">
                            {{$publiciter->description_publicite}}
                        </textarea>
                        @error('description_publicite')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror

                        <div class="row mb-3">
                            <div class="col md-6">
                                <label for="media">Ajouter un contenu media</label>
                                <input type="file" name="media" id="media" class="form-control">
                                @error('media')
                                    <p style="color: red">
                                        {{$message}}
                                    </p>
                                @enderror
                            </div>

                            <div class="col md-6">
                                <img src="/storage/{{$publiciter->media}}" alt="{{$publiciter->titre}}" width="100%">
                            </div>
                        </div>

                        <input type="submit" value="Enregister" class="btn btn-primary" style="width: 100%; margin-top:20px">
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
