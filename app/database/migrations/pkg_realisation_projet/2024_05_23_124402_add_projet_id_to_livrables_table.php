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
        Schema::table('livrables', function (Blueprint $table) {
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('livrables', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
            $table->dropColumn('projet_id');
        });
    }
};
