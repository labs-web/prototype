<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('livrables', function (Blueprint $table) {
            $table->unsignedBigInteger('nature_livrable_id')->nullable();

            // Définir la clé étrangère
            $table->foreign('nature_livrable_id')->references('id')->on('nature_livrables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('livrables', function (Blueprint $table) {
            $table->dropForeign(['nature_livrable_id']);
            $table->dropColumn('nature_livrable_id');
        });
    }
};
