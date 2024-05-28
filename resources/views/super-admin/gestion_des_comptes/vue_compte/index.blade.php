@extends('super-admin')

@section('title', 'Administration de la banque')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item">Gestion des comptes</li>
            <li class="breadcrumb-item"> <a href="{{route('Connecter.Administration.GestionDesCompte.liste_compte')}}">Liste</a> </li>
            <li class="breadcrumb-item active">Nom user</li>
        </ol>
        </nav>
    </div>
@endsection
        @php
                try {
                    $recuperation = \App\Models\Role::findOrFail($utilisateur->role);
                    $role = $recuperation->title;
                } catch (\Throwable $th) {
                    $role = 'empty';
                }

                //récupération de la date d'anniversaire
                $date = new \Core\Date\DateFormaterFr($utilisateur->birthday);
                $date_formater = $date->formatage_simple_fr();

                //Vérifier si le client possèdent un compte bancaire puis afficher les
                $compte_bancaire = \App\Models\CompteBancaire::where('users_id', $utilisateur->id)
                                                                    ->orderBy('created_at', 'asc')
                                                                    ->limit(1)
                                                                    ->get();

                //Role pour la modification partie admin
                $roles = \App\Models\Role::pluck('id', 'title');
                //Status d'un compte
                $status = \App\Models\StatusCompte::pluck('id', 'titre');
        @endphp

@section('content')
@if (session('succes'))
<div class="alert alert-success text-center">
    {{session('succes')}}
</div>
@endif
@if (session('erreur'))
<div class="alert alert-danger text-center">
    {{session('erreur')}}
</div>
@endif



<div class="container">
    <div class="card" style="padding: 10px">
        <div class="card-title">
            @if (empty($utilisateur->picture))
              <img src="{{asset('users-default/default.png')}}" alt="Profile" style="float: right" class="rounded-circle">
            @else
              <img src="/storage/{{$utilisateur->picture}}" alt="Profile" style="float: right"width="200px" class="rounded-circle">
            @endif
            <div class="row mb-3">
                <div class="col md-6">
                    <h5 style="text-decoration: underline; color: blue"> Nom et prénon:  </h5>
                    <h5 style="text-decoration: underline; color: blue">Nom d'utilisateur: </h5>
                    <h5 style="text-decoration: underline; color: blue"> Status: </h5>
                    <h5 style="text-decoration: underline; color: blue"> Date d'anniversaire: </h5>
                    <!-- Se réferencer sur le calcule de temps, très important -->
                    <h5 style="text-decoration: underline; color: blue"> Age: </h5>
                </div>
                <div class="col md-6">
                    @php
                        $ma_date = new \Core\Date\DateFormaterFr($utilisateur->birthday);
                    @endphp
                    <h5>{{$utilisateur->last_name}} {{$utilisateur->name}} </h5>
                    <h5> {{$utilisateur->username}}</h5>
                    <h5>{{$utilisateur->role->title}} </h5>
                    <h5> {{$date_formater}} </h5>
                    <!-- Se réferencer sur le calcule de temps, très important -->
                    <h5> {{$ma_date->diffForHumans()}} </h5>
                </div>

            </div>
        </div>
        <div class="card-body">
            <p style="text-align: justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quam id ducimus obcaecati inventore laborum repudiandae delectus ex dignissimos? Optio?
                @forelse ($compte_bancaire as $cB)
                    <h3>Quelques diverssent informations sur ce compte</h3>
                    @php
                    //incrementer du code php dans la boucle pour pouvoir avoir une instance de la varible compte bancaire
                    //j'njecte le numéro de compte dans un tableau, j'utilise str_split
                    $tableau = str_split($cB->numero_compte, 4);
                    //On vas imploder le tableau
                    $tableau_imploder = implode(' ', $tableau);
                    //je vais aussi spliter le cin
                    $cin = str_split($cB->cin, 3);
                    //On vas imploder ce tableau
                    $cin_imploder = implode(' ', $cin);
                    @endphp
                    <!-- INFORMATION SUR LE CLIENT -->
                <div class="row mb-3">
                    <div class="col md-6">
                        <h4 style="text-decoration: underline; color: blue">Localisation: </h4>
                        <h4 style="text-decoration: underline; color: blue">CIN: </h4>
                        <h4 style="text-decoration: underline; color: blue">Catégorie de compte: </h4>
                        <h4 style="text-decoration: underline; color: blue">Numéro de compte: </h4>
                        <h4 style="text-decoration: underline; color: blue">Status: </h4>
                    </div>
                    <div class="col md-6">
                        <h4> {{$cB->addresse}}</h4>
                        <h4> {{$cin_imploder}} </h4>
                        <h4> {{strtoupper($cB->compteBancaireCategorie->nomCategorie)}}</h4>
                        <h4> {{$tableau_imploder}} </h4>
                        <h4> {{$cB->statusCompte->titre}} </h4>
                    </div>
                </div>
                @empty
                    <h3 style="color: red"> L'utilisateur ne possèdent pas de compte bancaire </h3>
                @endforelse

                <!-- Utilisation de POLICY pour pouvoir afficher la suite -->
                <form action="{{route('Connecter.Administration.GestionDesCompte.modifier_un_compte', ['utilisateurId' => $utilisateur->id])}}" method="post">
                    <h5 class="text-center">PARTIE ADMIN</h5>
                    @csrf
                    @method('PUT')
                    <label for="role">Role de l'utilisateur</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Selectionner une option</option>
                        @foreach ($roles as $k =>$v)
                            <option value="{{$v}}" @if($v == $utilisateur->role->id) selected @endif> {{$k}} </option>
                        @endforeach
                    </select>
                    <label for="status">Status de l'utilisateur</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Selectionner une option</option>
                        @foreach ($status as $s =>$i)
                            <option value="{{$i}}" @if($i == $utilisateur->status) selected @endif> {{$s}} </option>
                        @endforeach
                    </select>
                    <input type="submit" value="Modifier" class="btn btn-primary" style="margin-top: 15px; width: 100%">
                </form>
            </p>
        </div>
    </div>
</div>
@endsection
