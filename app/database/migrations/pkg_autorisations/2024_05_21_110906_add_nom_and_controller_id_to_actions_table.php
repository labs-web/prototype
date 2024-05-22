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
        Schema::table('actions', function (Blueprint $table) {
            $table->string('nom');
            $table->unsignedBigInteger('controller_id');
            $table->foreign('controller_id')->references('id')->on('controllers')->onDelete('cascade');
            // TODO : Il manque la relation avec la table Persmission 
            // Il manque la relation avec lui
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropForeign(['controller_id']);
            $table->dropColumn('controller_id');
            $table->dropColumn('nom');
        });
    }
};
