@extends('super-admin')

@section('title', 'Liste de tous nos utilisateur')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item">Gestion des comptes</li>
            <li class="breadcrumb-item active">Liste</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container">
        @if (session('succes'))
            <div class="alert alert-success text-center">
                {{session('succes')}}
            </div>
        @endif
        @if (session('erreur'))
            <div class="alert alert-erreur text-center">
                {{session('erreur')}}
            </div>
        @endif
        <!-- resources/views/welcome.blade.php -->
        <livewire:table-utilisateur />


    </div>
@endsection
