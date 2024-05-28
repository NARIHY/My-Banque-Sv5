@extends('client')

@section('titre', 'Statistique de mon compte bancaire')

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                <div class="card-title">
                    <h3 style="color: grey; text-align:center">
                        Statistique de mon compte
                    </h3>
                </div>
                <div class="card-body">
                    <livewire:statistique-compte>
                </div>
        </div>
    </div>
@endsection

