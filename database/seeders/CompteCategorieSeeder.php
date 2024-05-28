<?php

namespace Database\Seeders;

use App\Models\CompteBancaireCategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompteCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            CompteBancaireCategorie::create([
                'nomCategorie' => 'Categ'. $i,
                'description' => 'description'. $i,
                'photo_couverture' => 'banque/categorie_compte/fHLX2qqVU1GK0i0b8ZCDwKF7QRewFyqKoZyj9uqY.jpg',
                'status' => '0',
            ]);
        }
    }
}
