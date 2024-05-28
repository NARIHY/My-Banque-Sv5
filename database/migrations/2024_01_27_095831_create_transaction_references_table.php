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
        Schema::create('transaction_references', function (Blueprint $table) {
            $table->id();
            $table->string('description_transfert');
            $table->string('expediteur_argent');
            $table->string('destinataire_argent');
            $table->string('transaction_reference');
            $table->string('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_references');
    }
};
