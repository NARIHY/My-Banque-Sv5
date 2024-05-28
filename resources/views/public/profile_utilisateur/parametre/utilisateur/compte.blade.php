@extends('client')

@section('titre', 'Parametre de mon compte')

@php
$date_daniversaire = new \Core\Date\DateFormaterFr($utilisateur->birthday);
$anniversaire_fr = $date_daniversaire->formatage_simple_fr();
//creation de compte
$date_creation_compte = new \Core\Date\DateFormaterFr($utilisateur->created_at);
$creation_compte = $date_creation_compte->formatage_simple_fr();
@endphp
@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
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
                <h4 class="text-center">Envie de changer votre:</h4>
                <form action="{{route('Connecter.Client.ProfilUtilisateur.sauvgarder_une_modification_dun_compte')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Nom de l'utilisateur -->
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$utilisateur->name}}">
                    @error('name')
                        <p style="color: red"> {{$message}} </p>
                    @enderror

                    <!-- Prénon de l'utilisateur -->
                    <label for="last_name">Prénon</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{$utilisateur->last_name}}">
                    @error('last_name')
                        <p style="color: red"> {{$message}} </p>
                    @enderror

                    <!-- Nom d'utilisateur de l'utilisateur -->
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{$utilisateur->username}}">
                    @error('username')
                        <p style="color: red"> {{$message}} </p>
                    @enderror

                    <!-- Prénon de l'utilisateur -->
                    <label for="email">Couriel</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$utilisateur->email}}">
                    @error('email')
                        <p style="color: red"> {{$message}} </p>
                    @enderror

                    <!-- Date d'anniversaire de l'utilisateur -->
                    <label for="birthday">Date d'anniversaire</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" value="{{$utilisateur->birthday}}">
                    @error('birthday')
                        <p style="color: red"> {{$message}} </p>
                    @enderror

                    <!-- Prénon de l'utilisateur -->
                    <label for="picture">Photo de couverture</label>
                    <input type="file" name="picture" id="picture" class="form-control">
                    @error('picture')
                        <p style="color: red"> {{$message}} </p>
                    @enderror
                    <input type="submit" value="Modifier" class="btn btn-primary" style="width: 100%; margin-top: 20px">
                </form>
                <!-- Session succes ou erreur -->
                @if (session('succes'))
                    <p style="color: green">
                        {{session('succes')}}
                    </p>
                @endif
                @if (session('erreur'))
                    <p style="color: rgb(255, 0, 0)">
                        {{session('erreur')}}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
