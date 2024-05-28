@extends('super-admin')

@section('title', 'Mon profile')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
                <li class="breadcrumb-item"> <a href="{{route('Connecter.Administration.Profile.voir_compte')}}">Mon Profile</a> </li>
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

    <div class="card">
        <div class="card-title text-center">
            <h3>
                Parametre de mon compte
            </h3>
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
        </div>
        <div class="card-body">
            <Ul>
                <a href="{{route('Connecter.Administration.Profile.modification_info_personnelle')}}" class="nav-link">
                    <li>
                        Modifier mes informations personnel
                    </li
                </a>
                <a href="" class="nav-link">
                    <li>
                        Modifier mon mots de passe
                    </li
                </a>
                <a href="" class="nav-link">
                    <li>
                        Suprimer mon compte
                    </li
                </a>
            </Ul>

        </div>
    </div>

@endsection

