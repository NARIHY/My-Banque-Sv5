@extends('client')

@section('titre', 'Retirer de l\'argent')

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                <div class="card-title text-center">
                    <h3>
                        Alliance Prestige
                    </h3>
                </div>
                <div class="card-body">
                    <h4>
                        Transfert d'argent : Procédure et Instructions
                    </h4>
                    <p style="text-align: justify">
                        Pour effectuer un retrait d'argent sur votre compte bancaire, suivez ces instructions simples :
                        <ol>
                            <li style="color: blue">Préparation des fonds :</li>
                            Assurez-vous d'avoir l'argent comptant ou les fonds à déposer prêts et disponibles.
                            <li style="color: blue">
                                Choix du compte :
                            </li>
                            Pour le retrait d'argent en ligne, on s'encharge de récupérer tous les informations sur vous pour faire le retrait. Le retrait ce fait uniquement sur le compte d'un
                            utilisateur qui est connecter aux site. Si vous voulez faire un retrait d'une autre compte, veuillez vous rendre au près de notre agence.
                            <li style="color: blue">
                                Remplissage du formulaire :
                            </li>
                            Si nécessaire, remplissez le formulaire de retrait avec les détails appropriés, y compris le montant du retrait.
                            <li style="color: blue">
                                Validation :
                            </li>
                            Vérifiez attentivement toutes les informations que vous avez fournies pour vous assurer qu'elles sont correctes.
                            <li style="color: blue">
                                Confirmation :
                            </li>
                            Une message flache en vert seras afficher aux dessous du formulaire pour vous dire que tous c'est bien passer
                            <li style="color: blue">
                                Reçu :
                            </li>
                            Après avoir effectué le retrait, une email seras envoyez vers vous pour afficher les détails de votre retrait.
                        </ol>
                       Nb: Le retrait se fait uniquement sur les comptes mobile money (Airtel, Telma et Orange).
                       Merci de votre compréhension.
                    </p>
                    <form action="" method="post">
                        @csrf
                        <label for="description_transfert">Description du transfert:</label>
                        <input type="text" name="description_transfert" id="description_transfert" class="form-control">
                        @error('description_transfert')
                            <p style="color: red"> {{$message}}</p>
                        @enderror

                        <label for="destinataire_argent">numéro de compte du destinataire:</label>
                        <input type="text" name="destinataire_argent" id="destinataire_argent" class="form-control">
                        @error('destinataire_argent')
                            <p style="color: red"> {{$message}}</p>
                        @enderror

                        <label for="montant">Entrer le montant:</label>
                        <input type="text" name="montant" id="montant" class="form-control">
                        @error('montant')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror

                        <label for="code_secret">Entrer votre code secret:</label>
                        <input type="password" name="code_secret" id="code_secret" class="form-control">
                        @error('code_secret')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror
                        <input type="submit" value="Transfert" class="btn btn-success" style="width: 100%; margin-top:20px">
                    </form>
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
                    @if (session('erreurs'))
                        <p style="color: rgb(255, 0, 0)">
                            {{session('erreurs')}}
                        </p>
                    @endif
                </div>
        </div>
    </div>
@endsection
