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
            $table->string('status', 10)->default('0')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compte_bancaire_categories', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
