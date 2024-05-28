@extends('client')

@section('titre', 'Parametre de mon compte bancaire')

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                @php
                    //Date debut de l'utilisateur
                    $date_debut = new \Core\Date\DateFormaterFr($compte_bancaire->created_at);
                    $date_debut_fr = $date_debut->formatage_simple_fr();
                    //Date mis a jour compte de l'utilisateur
                    $date_maj = new \Core\Date\DateFormaterFr($compte_bancaire->updated_at);
                    $date_maj_fr = $date_maj->formatage_simple_fr();
                    //Cin
                    $cin = new \Core\Chiffre\BaseChiffre($compte_bancaire->cin, 3);
                    $cin_esp = $cin->espacement();
                    //Numero de compte
                    $num_compte = new \Core\Chiffre\BaseChiffre($compte_bancaire->numero_compte,4);
                    $num_compte_esp = $num_compte->espacement();
                @endphp
                <div class="card-title">
                    <div class="row mb-3">
                        <div class="col md-6 text-center">
                            <!-- Photo de l'utilisateur -->
                            @if (empty($compte_bancaire->users->picture))
                                <img src="{{asset('users-default/default.png')}}" alt="Profile" class="rounded-circle" style="width: 200px; height:200px; ">
                            @else
                                <img src="/storage/{{$compte_bancaire->users->picture}}" alt="Profile" class="rounded-circle" style="width: 200px; height:200px; ">
                            @endif
                        </div>
                        <div class="col md-6 text-center">
                            <h3> {{$compte_bancaire->users->last_name}} {{strtoupper($compte_bancaire->users->name)}} </h3>
                            <h5> {{$compte_bancaire->users->username}} </h5>
                            <div class="row mb-3">
                                <div class="col md-6" style="text-align: left">
                                    <h6 style="text-decoration: underline">
                                        Addresse couriel:
                                    </h6>
                                    <h6 style="text-decoration: underline">
                                        CIN:
                                    </h6>
                                    <h6 style="text-decoration: underline">
                                        Catégorie de compte:
                                    </h6>
                                    <h6 style="text-decoration: underline">
                                        Numéro de compte:
                                    </h6>
                                    <h6 style="text-decoration: underline">
                                        Début d'activité:
                                    </h6>
                                    <h6 style="text-decoration: underline">
                                        Mis à jour le:
                                    </h6>
                                </div>
                                <div class="col md-6" style="text-align: left">
                                    <h6 style="color: red">
                                        {{$compte_bancaire->users->email}}
                                    </h6>
                                    <h6>
                                        {{$cin_esp}}
                                    </h6>
                                    <h6>
                                        {{$compte_bancaire->compteBancaireCategorie->nomCategorie}}
                                    </h6>
                                    <h6>
                                        {{$num_compte_esp}}
                                    </h6>
                                    <h6>
                                        {{$date_debut_fr}}
                                    </h6>
                                    <h6>
                                        {{$date_maj_fr}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3>
                        Modifier mes parametre:
                    </h3>
                    <div>
                        <form action="{{route('Connecter.Client.ProfilUtilisateur.sauvgarder_modification_compte_bancaire')}}" method="post">
                            @method('PUT')
                            @csrf
                            <label for="addresse">Envie de modifier votre localisation actuelle:</label>
                            <input type="text" name="addresse" id="addresse" class="form-control" value="{{$compte_bancaire->addresse}}">
                            @error('addresse')
                                <p style="color: red">
                                    {{$message}}
                                </p>
                            @enderror
                            <label for="compte_bancaire_categorie_id">Envie de commencer une nouvelle aventure:</label>
                            <select name="compte_bancaire_categorie_id" id="compte_bancaire_categorie_id" class="form-control">
                                <option value="">Choisir une catégorie de compte</option>
                                @foreach ($categorie_compte as $k => $v)
                                    <option value="{{$v}}" @if ($compte_bancaire->compteBancaireCategorie->id === $v) selected @endif> {{$k}} </option>
                                @endforeach
                            </select>
                            @error('compte_bancaire_categorie_id')
                                <p style="color: red">
                                    {{$message}}
                                </p>
                            @enderror
                            <h6>Envie de modifier votre code secret? Ne vous enfaite pas, vous pouvez le changer d'ici</h6>
                            <h6 style="color: rgb(236, 200, 40)"> Nb: votre code secret doit être uniquement composer par des chiffre (8 caractère minimum et 8 caractère maximum) </h6>
                            <label for="ancien_code_secret">Entrez votre ancienne code secret:</label>
                            <input type="password" name="ancien_code_secret" id="ancien_code_secret" class="form-control">
                            @error('ancien_code_secret')
                                <p style="color: red">
                                    {{$message}}
                                </p>
                            @enderror
                            <label for="code_secret">Entrez votre nouveau code secret:</label>
                            <input type="password" name="code_secret" id="code_secret" class="form-control">
                            @error('code_secret')
                                <p style="color: red">
                                    {{$message}}
                                </p>
                            @enderror
                            <label for="code_secret_confirmation">Confirmer le nouveau code secret:</label>
                            <input type="password" name="code_secret_confirmation" id="code_secret_confirmation" class="form-control">
                            @error('code_secret_confirmation')
                                <p style="color: red">
                                    {{$message}}
                                </p>
                            @enderror
                            <input type="submit" value="Enregistrer" class="btn btn-primary" style="width: 100%; margin-top: 20px">
                        </form>
                    </div>
                    <!-- Session succes ou erreur -->
                    @if (session('succes'))
                        <p style="color: green">
                            {{session('succes')}}
                        </p>
                    @endif
                    @if (session('erreur'))
                        <p style="color: rgb(255, 0, 0)">
                            {{session('erreur')}}
                        </p>
                    @endif
                </div>
        </div>
    </div>
@endsection
