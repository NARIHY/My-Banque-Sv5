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
    $text = new \Core\Text\Text();
    $date = new \Core\Date\DateFormaterFr($utilisateur->birthday);
@endphp

@section('content')
    <div class="card">
        <div class="mots depasse">
            <h4>Modifier mon mots de passe</h4>
            <form action="" method="post">
                @csrf
                @method('PUT')
                {{$form->password("Entrez votre mots de passe pour confirmer la modification: ", "old_password")}}
                @error('old_password')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                {{$form->password("Entrez votre nouveau mots de passe pour confirmer la modification: ", "new_password")}}
                @error('new_password')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                {{$form->password("Confirmer votre mots de passe pour confirmer la modification: ", "confirmation_new_password")}}
                @error('confirmation_new_password')
                    <p style="color: red">
                        {{$message}}
                    </p>
                @enderror
                <div class="text-center">
                    {{$form->input_button('sauvgarder les modification', 'btn btn-primary')}}
                </div>
            </form>
        </div>
    </div>
@endsection
