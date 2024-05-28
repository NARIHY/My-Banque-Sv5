@extends('super-admin')

@section('title', 'Administration de la banque')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item active">Service client</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')

@endsection
