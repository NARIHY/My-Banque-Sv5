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
            $table->string('tarif')->nullable()->default('5000');
            $table->float('taux')->nullable()->default(7.0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compte_bancaire_categories', function (Blueprint $table) {
            $table->dropColumn('tarif');
            $table->dropColumn('taux');
        });
    }
};
