<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CompteBancaire;
use Livewire\WithPagination;

class ListeCompteBancaire extends Component
{
    use WithPagination;
    public function render()
    {
        $compte_bancaire = CompteBancaire::orderby('created_at', 'desc')
                                            ->where('corbeille', '!=', '1')
                                            ->paginate(20);
        return view('livewire.liste-compte-bancaire', compact('compte_bancaire'));
    }
}
