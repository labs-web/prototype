<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->string('nom')->after('id');
            $table->text('description')->nullable()->after('nom');
            $table->unsignedBigInteger('categorie_technologies_id')->after('description');
            $table->foreign('categorie_technologies_id')->references('id')->on('categorie_technologies')->onDelete('cascade');
            $table->unsignedBigInteger('competence_id')->after('categorie_technologies_id');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            //
        });
    }
};
