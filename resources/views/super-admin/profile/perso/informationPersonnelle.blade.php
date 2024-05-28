@extends('super-admin')

@section('title', 'Mon profile')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
                <li class="breadcrumb-item active">Mon Profile</li>
            </ol>
        </nav>
    </div>
@endsection
@php
    $form = new \Core\Form\FormHtml();
    $chiffre = rand(1000000000,9999999999);
@endphp
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
    <div class="card" style="padding: 20px">
            <h4>Modifier mes informations personnelle</h4>
            <form action="{{route('Connecter.Administration.Profile.sauvgarder_une_modification_dun_admin_compte')}}" method="post">
                @csrf
                @method('PUT')
                {{$form->input('text', "Votre nom:", "name","Votre nom", $utilisateur->name)}}
                @error('name')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                {{$form->input('text', "Votre prénon:", "last_name","Votre prénon", $utilisateur->last_name)}}
                @error('last_name')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                {{$form->input('email', "Votre addresse email:", "email","example@gmail.mg", $utilisateur->email)}}
                @error('email')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                <label for="username">Votre nom d'utilisateur:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{$utilisateur->username}}" autocomplete="username">

                @error('username')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                <label for="password">Entrez votre mots de passe pour confirmer la modification:</label>
                <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                @error('password')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                {{$form->image("picture", "$utilisateur->picture")}}
                @error('')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                <div class="text-center">
                    {{$form->input_button('sauvgarder les modification', 'btn btn-primary','btn')}}
                </div>
            </form>
    </div>
@endsection
