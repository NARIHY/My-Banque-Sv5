@extends('super-admin')

@section('title', 'Liste des rôles')

@section('pagetitle')
    <div class="pagetitle">
        <a href="" style="float: right" class="btn btn-success">Ajouter +</a>
        <h1>Gestion des rôles</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item">Gestion des rôles</li>
            <li class="breadcrumb-item active">liste</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
<table class="table table-dark table-borderless">
    <thead>
        <tr>
            <th scope="col" style="color: yellow">#</th>
            <th scope="col" style="color: yellow">titre</th>
            <th scope="col" style="color: yellow">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
            <tr>
                <th scope="row" style="color: yellow"> {{$role->id}} </th>
                <td>{{$role->title}}</td>
                <td>
                    <div class="row mb-3">
                        <div class="col md-6">
                            <a href="#" class="btn btn-primary">Modifier</a>
                        </div>
                        <div class="col md-6">
                            <form action="" method="post" wire:>
                                @csrf
                                <input type="submit" wire:submit class="btn btn-danger" value="Suprimer">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <th scope="row"></th>
                <td>Aucune rôles n'est inscrite sur le moment</td>
                <td></td>
            </tr>
        @endforelse
    </tbody>
  </table>
  {{$roles->links()}}
@endsection
