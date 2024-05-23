<?php

namespace App\Models\pkg_projets;

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
        Schema::table('messages', function (Blueprint $table) {
            $table->string('titre')->after('id');
            $table->text('description')->after('titre');
            $table->boolean('isLue')->default(false);
            $table->unsignedBigInteger('projet_id')->after('description');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->unsignedBigInteger('tache_id')->after('projet_id');
            $table->foreign('tache_id')->references('id')->on('taches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
            $table->dropForeign(['tach_id']);
            $table->dropColumn('titre');
            $table->dropColumn('description');
            $table->dropColumn('isLue');
            $table->dropColumn('projet_id');
            $table->dropColumn('tach_id');
        });
    }
};
