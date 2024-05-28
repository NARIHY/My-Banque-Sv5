@extends('super-admin')

@section('title', 'Nos publicité')

@section('pagetitle')
    <div class="pagetitle">
        <a href="{{route('Connecter.Administration.Globale.Publicite.publiciter_creer')}}" class="btn btn-success" style="float: right">Ajouter</a>
        <h1>Tableau de bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
                <li class="breadcrumb-item active">Nos publicités</li>
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
        <table class="table table-dark table-borderless">
            <thead>
                <tr>
                    <th scope="col" style="color: yellow">#</th>
                    <th scope="col" style="color: yellow">Titre</th>
                    <th scope="col" style="color: yellow">Status</th>
                    <th scope="col" style="color: yellow">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($publicites as $pub)
                    <tr>
                        <th scope="row" style="color: yellow">
                            {{$pub->id}}
                        </th>
                        <td>
                            {{$pub->titre}}
                        </td>
                        <td>
                            @if ($pub->status_pub === 'non publié')
                                <p style="color: orange">
                                    {{$pub->status_pub}}
                                </p>
                            @else
                                <p style="color: green">
                                    {{$pub->status_pub}}
                                </p>
                            @endif
                        </td>
                        <td>
                            <div class="row mb-3">
                                @if ($pub->status_pub === 'non publié')
                                    <div class="col md-4">
                                        <form action="{{route('Connecter.Administration.Globale.Publicite.publiciter_poster', ['publiciteId' => $pub->id])}}" method="post">
                                            @csrf
                                            <input type="submit" value="Poster" class="btn btn-primary">
                                        </form>
                                    </div>
                                @endif
                                <div class="col md-4">
                                    <a href="{{route('Connecter.Administration.Globale.Publicite.publiciter_edition', ['publiciteId' => $pub->id])}}" class="btn btn-secondary">Modifier</a>
                                </div>
                                <div class="col md-4">
                                    <form action="{{route('Connecter.Administration.Globale.Publicite.publiciter_supression_simple', ['publiciteId' => $pub->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Suprimer" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row" style="color: yellow"></th>
                        <td></td>
                        <td> Aucune publicité pour le moment</td>
                        <td></td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{$publicites->links()}}
    </div>
@endsection
