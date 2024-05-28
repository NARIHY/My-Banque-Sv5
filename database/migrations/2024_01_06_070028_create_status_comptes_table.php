<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Créer seulement l'entite status des comptes
        Schema::create('status_comptes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->timestamps();
        });
        //lie les status des compte à un compte bancaire
        Schema::table('compte_bancaires', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\StatusCompte::class)
                                                ->constrained()
                                                ->cascadeOnDelete()
                                                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_comptes');
    }
};
