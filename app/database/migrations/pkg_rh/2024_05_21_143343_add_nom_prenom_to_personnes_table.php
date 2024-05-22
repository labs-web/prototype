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
        Schema::table('personnes', function (Blueprint $table) {
            $table->string('nom')->after('id');
            $table->string('prenom')->after('nom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personnes', function (Blueprint $table) {
            $table->dropColumn('nom');
            $table->dropColumn('prenom');
        });
    }
};
