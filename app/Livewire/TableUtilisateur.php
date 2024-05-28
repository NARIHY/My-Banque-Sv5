<?php
// TableUtilisateur.php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TableUtilisateur extends Component
{
    use WithPagination;

    public  $recherche = '';
    protected $queryString = [
        'recherche' => ['except' => '']
    ];

    public function render()
    {
        $utilisateurs = User::where('username', 'LIKE', "%{$this->recherche}%")->paginate(20);

        return view('livewire.gestionCompte.table-utilisateur', compact('utilisateurs'));
    }
}

