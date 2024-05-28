@extends('super-admin')

@section('title', 'Catégorie de compte bancaire')

@section('pagetitle')
    <div class="pagetitle">
        <a href="{{route('Connecter.Administration.CompteBancaireCategorie.creation_categorie')}}" style="float: right;" class="btn btn-success">Ajouter une catégorie de compte</a>
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item active">Catégorie de compte bancaire</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
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
<div class="container">
    <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nomCatégorie</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($compte_categorie as $categorie)
                <tr>
                    <th scope="row">
                        {{$categorie->id}}
                    </th>

                    <td>
                        {{$categorie->nomCategorie}}
                    </td>
                    <td>
                        <div class="row mb-3">
                            <!-- pour la modification -->
                            <div class="col md-6">
                                <a href="{{route('Connecter.Administration.CompteBancaireCategorie.modification_dune_categorie', ['id' => $categorie->id])}}" class="btn btn-primary">Modifier</a>
                            </div>
                            <!-- Pour la supréssion -->
                            <div class="col md-6">
                                <form action="{{route('Connecter.Administration.CompteBancaireCategorie.suppression_simple', ['id' => $categorie->id])}}" method="post">
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
                    <td style="text-align: center">Aucune catégorie de compte pour le moment</td>
                    <td></td>
                </tr>
            @endforelse

        </tbody>
      </table>
</div>


@endsection
