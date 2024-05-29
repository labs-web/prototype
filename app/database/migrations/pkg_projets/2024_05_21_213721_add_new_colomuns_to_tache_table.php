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
        Schema::table('taches', function (Blueprint $table) {
            $table->string('nom');
            $table->text('description');
            $table->string('priorité');
            $table->Date('dateEchéance');
            $table->unsignedBigInteger('personne_id')->nullable();
            $table->unsignedBigInteger('projets_id');
            $table->unsignedBigInteger('status_tache_id');
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->foreign('projets_id')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('status_tache_id')->references('id')->on('statut_taches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->dropColumn('nom');
            $table->dropColumn('description');
            $table->dropColumn('priorité');
            $table->dropColumn('dateEchéance');
            $table->dropColumn('personne_id');
            $table->dropColumn('projets_id');
            $table->dropColumn('status_tache_id');
        });
    }
};
