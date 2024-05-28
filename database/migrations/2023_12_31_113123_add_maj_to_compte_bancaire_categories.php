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
        Schema::table('compte_bancaire_categories', function (Blueprint $table) {
            $table->time('heure_douverture')->nullable();
            $table->time('heure_fermeture')->nullable();
            $table->string('jour_douverture', 20)->nullable()->default('5');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compte_bancaire_categories', function (Blueprint $table) {
            $table->dropColumn('heure_douverture');
            $table->dropColumn('heure_fermeture');
            $table->dropColumn('jour_douverture');
        });
    }
};
