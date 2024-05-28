<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\CompteBancaireCategorie;
use App\Models\User;
use Database\Seeders\CompteCategorieSeeder;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

/**
 * Un class pour les tests globale des compte bancaire
 */
class CompteBancaireTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Un test qui permet de vérifier le status de
     * la liste des categorie de compte
     * une erreur
     * @return void
     */
    public function test_edition_categorie_echec(): void
    {
        $utilisateur = User::create([
            'name' => 'foo',
            'password'=> bcrypt('password'),
            'role' => '1',
            'email' => 'foobar@lo.jo'
        ]);

        $response = $this->actingAs($utilisateur)
                            ->withExceptionHandling()
                            ->get('/Connecter/Administration-Banque/Categorie-de-compte/');

        $response->assertStatus(302);
    }

    /**
     * Une erreur sur un id de compte introuvable
     *//*
    public function test_detail_sur_un_compte(): void
    {
        $utilisateur = User::create([
            'name' => 'foo',
            'password'=> bcrypt('password'),
            'role' => '1',
            'email' => 'foobar@lo.jo'
        ]);
    }*/
}
