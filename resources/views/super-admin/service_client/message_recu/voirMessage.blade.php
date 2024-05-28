@extends('super-admin')

@section('title', $message->sujet_conversation)

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item"> Service client </li>
            <li class="breadcrumb-item"> sujet </li>
            <li class="breadcrumb-item active">{{$message->sujet_conversation}}</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="card" style="padding: 20px">
            @php
                //récupération de la date d'anniversaire
                $date = \Carbon\Carbon::parse($message->created_at);
                $date_formater = $date->format('d M Y');
                //lecteur si null renvoye une valeur null
                try {
                    $lec = \App\Models\User::findOrFail($message->lecteur);
                    $lecteur = [
                        $lec->last_name,
                        $lec->name
                    ];
                } catch(\Exception $e) {
                    $lecteur = "Le responsable";
                }
            @endphp
            <div style="float: right; text-align:right;">
                <p>Madagascar le, {{$date_formater}}</p>
                <p> {{$message->users->last_name}} {{$message->users->name}} </p>
                <p> Utilisateur simple </p>
            </div>
            <div style="float: left;">
                <p>Ma Banque</p>
                <p>Service Client</p>
                <p>Madame/Monsieur
                    @if (is_array($lecteur))
                        @php
                        //Imploder uniquement
                        $lect = implode(' ', $lecteur)
                        @endphp
                        {{$lect}},
                    @else
                    {{$lecteur}}
                    @endif
                </p>
            </div>
            <div class="card-body">
                <h6>Sujet: {{$message->sujet_conversation}}</h6>
                <div>
                    <p style="text-align: justify">
                        {{$message->introduction_lettre}}
                    </p>
                    <p style="text-align: justify">
                        {{$message->contenu_lettre}}
                    </p>
                    <p style="text-align: justify">
                        {{$message->conclusion_lettre}}
                    </p>
                </div>
                <p style="float: right; text-align:right">
                    Signature <br>
                    {{$message->users->username}}
                </p>


            </div>
            <div class="text-center">
                <a href="#" class="btn btn-success">
                    Répondre <i class="bi bi-arrow-90deg-right"></i>
                </a>
            </div>
    </div>

</div>

@endsection
