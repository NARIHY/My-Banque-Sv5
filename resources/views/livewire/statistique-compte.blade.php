<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <th scope="col" style="color: yellow">#</th>
                <th scope="col" style="color: yellow">Téléphone</th>
                <th scope="col" style="color: yellow">numéro de compte</th>
                <th scope="col" style="color: yellow">Montant</th>
                <th scope="col" style="color: yellow">Référence</th>
                <th scope="col" style="color: yellow">description</th>
                <th scope="col" style="color: yellow">date</th>
            </tr>
        </thead>
            <tbody>
                @forelse ($deposite as $depot)
                                @php
                                    //Argent
                                    $arg = new \Core\Chiffre\BaseChiffre($depot->montant, 3);
                                    //nom compte
                                    $numero_compte = new \Core\Chiffre\BaseChiffre($depot->numero_compte, 4);
                                    //date
                                    $date_fr = new \Core\Date\DateFormaterFr($depot->created_at);
                                @endphp
                    <tr>
                        <th scope="row" style="color: yellow">
                            {{$depot->id}}
                        </th>
                        <td>
                             {{$depot->telephone}}
                        </td>
                        <td>
                            {{$numero_compte->espacement()}}
                        </td>
                        <td>
                            {{$arg->formatage_argent()}} MGA
                        </td>
                        <td>
                            {{$depot->reference}}
                        </td>
                        <td>
                             {{$depot->description}}
                        </td>
                        <td>
                            {{$date_fr->formatage_simple()}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td> Vide pour le moment </td>
                        <td></td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                @endforelse

            </tbody>
      </table>
      {{$deposite->links()}}
</div>
