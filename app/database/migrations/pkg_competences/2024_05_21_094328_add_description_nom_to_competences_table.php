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
        Schema::table('competences', function (Blueprint $table) {
            $table->string('nom');
            $table->text('description');
            $table->unsignedBigInteger('niveau_competences_id');
            $table->foreign('niveau_competences_id')->references('id')->on('niveau_competences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competences', function (Blueprint $table) {
            $table->dropForeign(['niveau_competences_id']); 
            $table->dropColumn('niveau_competences_id');
            $table->dropColumn('nom');
            $table->dropColumn('description');
        });
    }
};
