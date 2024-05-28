@extends('super-admin')

@section('title', 'Status des comptes')

@section('pagetitle')
    <div class="pagetitle">
        <a href="{{route('Connecter.Administration.CompteBancaire.StatusCompte.creation_status_compte')}}" style="float: right" class="btn btn-success">Ajouter</a>
        <h1>Tableau de bord</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item active">Status des comptes</li>
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
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
                @forelse ($status_compte as $status)
                    <tr>
                        <th scope="row">
                            {{$status->id}}
                        </th>

                        <td>
                            {{$status->titre}}
                        </td>

                        <td>
                            <div class="row mb-3">
                                <!-- pour la modification -->
                                <div class="col md-6">
                                    <a href="{{route('Connecter.Administration.CompteBancaire.StatusCompte.modification_status_compte',['id' => $status->id])}}" class="btn btn-primary">Modifier</a>
                                </div>
                                <!-- Pour la supréssion -->
                                <div class="col md-6">
                                    <form action="{{route('Connecter.Administration.CompteBancaire.StatusCompte.suprimer_status_compte',['id' => $status->id])}}" method="post">
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
                        <td style="text-align: center">Aucune status de compte n'est inscrit pour le moment</td>
                        <td></td>
                    </tr>
                @endforelse

            </tbody>
          </table>
    </div>
@endsection
