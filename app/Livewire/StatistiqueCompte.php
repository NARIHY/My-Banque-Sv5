<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\CompteBancaire;
use App\Models\Deposite;
use Livewire\Component;
use Livewire\WithPagination;


class StatistiqueCompte extends Component
{


    public function render()
    {
        /** @var CompteBancaire $compte_bancaire Recup du compte de l'utilisateur */
        $compte_bancaire = CompteBancaire::where('users_id', Auth::user()->id)->firstOrFail();
        //Récuperer
        $deposite = Deposite::where('numero_compte', $compte_bancaire->numero_compte)
                                ->paginate(15);
        return view('livewire.statistique-compte', [
            'deposite' => $deposite
        ]);
    }
}
