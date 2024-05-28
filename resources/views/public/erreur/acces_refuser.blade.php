@extends('client')

@section('titre', 'Accès refuser')



@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px; ">
            <div class="card-body">
                <div class="bg-light">
                    <h1 class="acces_refuser_title text-center">
                        <i class="fas fa-ban mr-2"></i> Accès refuser
                    </h1>
                    <p class="p_acces_refuser text-center">
                        Désolé, vous n'avez pas la permission d'accéder à cette page.
                    </p>
                    <a href="javascript:history.back()" class="nav-link text-center" style="color: blue">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
