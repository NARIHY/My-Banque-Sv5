@extends('super-admin')

@section('title', 'Administration de la banque')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Message reçu</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item"> Service client</li>
            <li class="breadcrumb-item active">Répondre</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="container">

    </div>
@endsection
