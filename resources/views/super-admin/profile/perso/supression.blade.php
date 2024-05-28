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
<div class="delete">
    <h4>Suprimer mon compte</h4>
    <form action="{{route('Connecter.Administration.Profile.suprimer_compte', ['chiffre' => $chiffre . $chiffre . $chiffre . $chiffre])}}" method="post">
        @csrf
        @method('DELETE')
        {{$form->password("Entrez votre mots de passe: ", "password")}}
        @error('password')
            <p style="color: red">
                {{$message}}
            </p>
        @enderror
        {{$form->input_button('Suprimer mon compte', 'btn btn-danger', 'suprimer',"suprimer_compte()")}}
    </form>
</div>
<script src="{{asset('MonJs/suprimer.js')}}"></script>
@endsection

