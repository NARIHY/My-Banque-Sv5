@extends('client')

@section('titre', 'Information sur mon compte bancaire')

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
                        Dépôt d'argent : Procédure et Instructions
                    </h4>
                    <p style="text-align: justify">
                        Pour effectuer un dépôt d'argent sur votre compte bancaire, suivez ces instructions simples :
                        <ol>
                            <li style="color: blue">Préparation des fonds :</li>
                            Assurez-vous d'avoir l'argent comptant ou les fonds à déposer prêts et disponibles.
                            <li style="color: blue">
                                Identification :
                            </li>
                            Dirigez-vous vers votre agence bancaire locale et identifiez-vous auprès du guichetier ou utilisez un guichet automatique si disponible.
                            <li style="color: blue">
                                Choix du compte :
                            </li>
                            Sélectionnez le compte sur lequel vous souhaitez effectuer le dépôt. Si vous avez plusieurs comptes, assurez-vous de choisir le bon.
                            <li style="color: blue">
                                Comptage des fonds :
                            </li>
                            Si vous déposez de l'argent comptant, comptez soigneusement les fonds pour vous assurer que le montant est correct.
                            <li style="color: blue">
                                Remplissage du formulaire :
                            </li>
                            Si nécessaire, remplissez le formulaire de dépôt avec les détails appropriés, y compris le montant du dépôt.
                            <li style="color: blue">
                                Validation :
                            </li>
                            Vérifiez attentivement toutes les informations que vous avez fournies pour vous assurer qu'elles sont correctes.
                            <li style="color: blue">
                                Confirmation :
                            </li>
                            Remettez les fonds et le formulaire au guichetier ou insérez-les dans le guichet automatique et suivez les instructions pour confirmer le dépôt.
                            <li style="color: blue">
                                Reçu :
                            </li>
                            Après avoir effectué le dépôt, assurez-vous de récupérer un reçu confirmant la transaction. Conservez ce reçu en lieu sûr pour référence future.
                        </ol>
                        D'autre part, si vous possèdez une compte Mvola, OrangeMoney ou bien encore Airtel money. Veuillez remplir les informations ci-dessous:
                    </p>
                    <form action="" method="post">
                        @csrf
                        <label for="telephone">Entrer votre numéro de téléphone:</label>
                        <input type="text" name="telephone" id="telephone" class="form-control">
                        @error('telephone')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror
                        <label for="montant">Entrer le montant:</label>
                        <input type="text" name="montant" id="montant" class="form-control">
                        @error('montant')
                            <p style="color: red">
                                {{$message}}
                            </p>
                        @enderror
                        <input type="submit" value="Déposer" class="btn btn-success" style="width: 100%; margin-top:20px">
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
                </div>
        </div>
    </div>
@endsection
