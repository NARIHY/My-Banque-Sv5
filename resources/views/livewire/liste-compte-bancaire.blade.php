<div>
    {{-- Success is as dangerous as failure. --}}
    <table class="table table-dark table-borderless">
        <thead>
          <tr>
            <th scope="col" style="color: yellow">#</th>
            <th scope="col" style="color: yellow">Nom</th>
            <th scope="col" style="color: yellow">Prénon</th>
            <th scope="col" style="color: yellow">Catégorie de compte</th>
            <th scope="col" style="color: yellow">Status</th>
            <th scope="col" style="color: yellow">Action</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($compte_bancaire as $compte)
                <tr>
                    <th scope="row" style="color: yellow">
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
                                <a href="{{route('Connecter.Administration.CompteBancaire.detail_sur_un_compte', ['id' => $compte->id])}}" class="btn btn-primary">Voir +</a>
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

      {{$compte_bancaire->links()}}
</div>
