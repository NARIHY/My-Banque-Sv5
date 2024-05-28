@extends('super-admin')

@section('title', 'Message reçu')

@section('pagetitle')
    <div class="pagetitle">
        <h1>Message reçu</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Connecter.Administration.tableau_de_bord')}}">Tableau de bord</a> </li>
            <li class="breadcrumb-item active">Acceuil</li>
        </ol>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
    <table class="table table-dark table-borderless">
        <thead>
          <tr>
            <th scope="col" style="color: yellow">#</th>
            <th scope="col" style="color: yellow">Expéditeur</th>
            <th scope="col" style="color: yellow">Sujet de conversation</th>
            <th scope="col" style="color: yellow">Status</th>
            <th scope="col" style="color: yellow">Action</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($service_client as $service)
                <tr>
                    <th scope="row" style="color: yellow">
                        {{$service->id}}
                    </th>

                    <td>
                        <a href="{{route('Connecter.Administration.GestionDesCompte.vue_sur_un_comptes', ['id' => $service->users_id])}}">{{$service->users->last_name}}  {{$service->users->name}}</a>
                    </td>
                    <td>
                        {{$service->sujet_conversation}}
                    </td>
                    <td>
                        @if($service->status === '0')
                            <p style="color: red">
                                Non lu
                            </p>
                        @else
                            <p style="color: green">
                                lu
                            </p>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('Connecter.Administration.ServiceClient.voir_message_recu', ['messageId' =>$service->id])}}" class="btn btn-primary">Voir</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row"></th>
                    <td style="text-align: center">Aucune message pour le moment</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse

        </tbody>
      </table>
      {{$service_client->links()}}
</div>
@endsection
