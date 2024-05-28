@extends('super-admin')

@section('title', 'Corbeille')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Banque</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item">Banque</li>
            <li class="breadcrumb-item active">Corbeille</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
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
    <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénon</th>
            <th scope="col">Catégorie de compte</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($compte_bancaire as $compte)
                <tr>
                    <th scope="row">
                        {{$compte->id}}
                    </th>

                    <td>
                        {{$compte->users->name}}
                    </td>
                    <td>
                        {{$compte->users->last_name}}
                    </td>
                    <td>
                        {{$compte->compteBancaireCategorie->nomCategorie}}
                    </td>
                    <td>
                        @if ($compte->statusCompte->id === 1)
                            <p style="color: orange">
                                {{$compte->statusCompte->titre}}
                            </p>
                        @elseif ($compte->statusCompte->id === 2)
                            <p style="color: forestgreen">
                                {{$compte->statusCompte->titre}}
                            </p>
                        @else
                            <p style="color: red">
                                {{$compte->statusCompte->titre}}
                            </p>
                        @endif
                    </td>
                    <td>
                        <div class="row mb-3">
                            <!-- pour la modification -->
                            <div class="col md-6">
                                <a href="{{route('Connecter.Administration.GestionDesCompte.vue_sur_un_comptes', ['id' => $compte->id])}}" class="btn btn-primary">Voir +</a>
                            </div>
                            <!-- Pour la supréssion -->
                            <div class="col md-6">
                                <form action="{{route('Connecter.Administration.CompteBancaire.StatusCompte.mettre_un_compte_inactif', ['compteId' => $compte->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Suprimer">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row"></th>
                    <td style="text-align: center">Aucune compte n'est inscrit pour le moment</td>
                    <td></td>
                </tr>
            @endforelse

        </tbody>
      </table>
</div>
@endsection
