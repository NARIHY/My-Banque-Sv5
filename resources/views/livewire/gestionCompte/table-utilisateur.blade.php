<div>



        <table class="table table-dark table-borderless">
            <thead>
                <tr>
                    <th scope="col" style="color: yellow">#</th>
                    <th scope="col" style="color: yellow">nom</th>
                    <th scope="col" style="color: yellow">prénon</th>
                    <th scope="col" style="color: yellow">username</th>
                    <th scope="col" style="color: yellow">role</th>
                    <th scope="col" style="color: yellow">email</th>
                    <th scope="col" style="color: yellow">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($utilisateurs as $utilisateur)
                    <tr>
                        <th scope="row" style="color: yellow"> {{$utilisateur->id}} </th>
                        <td>{{$utilisateur->name}}</td>
                        <td>{{$utilisateur->last_name}}</td>
                        <td>{{$utilisateur->username}}</td>
                        <td>{{$utilisateur->role->title}}</td>
                        <td>{{$utilisateur->email}}</td>
                        <td>
                            <div class="row mb-3">
                                <div class="col md-6">
                                    <a href="{{route('Connecter.Administration.GestionDesCompte.vue_sur_un_comptes', ['id' => $utilisateur->id])}}" class="btn btn-primary">Modifier</a>
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
                        <td></td>
                        <td></td>
                        <td>Aucun utilisateur inscrit pour le moments</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
          </table>
          {{$utilisateurs->links()}}

</div>
