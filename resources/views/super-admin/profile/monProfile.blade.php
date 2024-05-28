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
        <div class="card-title">
            <h3 class="text-center">
                Mon profile
            </h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col md-6">
                    <div class="row mb-3">
                        <div class="col md-6">
                            <h4>
                                Nom
                            </h4>
                            <h4>
                                Prénon:
                            </h4>
                            <h5>
                                Username:
                            </h5>
                            <h6>
                                Role:
                            </h6>
                            @if (!empty($utilisateur->status))
                                <h6>
                                    Status:
                                </h6>
                            @endif
                            <h6>
                                Date d'anniversaire:
                            </h6>
                            <h6>
                                Âge:
                            </h6>
                        </div>
                        <div class="col md-6">
                            <h4>
                                 {{$text->mettre_un_mots_en_majuscule($utilisateur->name)}}
                            </h4>
                            <h4>
                                {{$text->mettre_en_majuscule_premier_lettre($utilisateur->last_name)}}
                            </h4>
                            <h5>
                                {{$utilisateur->username}}
                            </h5>
                            <h6>
                                {{$utilisateur->role->title}}
                            </h6>
                            <h6>
                                {{$utilisateur->status}}
                            </h6>
                            <h6>
                                {{$date->formatage_simple_fr()}}
                            </h6>
                            <h6>
                                {{$date->diffForHumans()}}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col md-6 text-center">
                    <img src="/storage/{{$utilisateur->picture}}"  width="200px" height="200px" alt="{{$utilisateur->name}}-{{$utilisateur->last_name}}">
                </div>
            </div>
        </div>
    </div>
@endsection
