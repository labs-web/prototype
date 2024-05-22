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
        Schema::table('groupes', function (Blueprint $table) {
            $table->string('nom')->after('id');
            $table->string('description')->nullable()->after('nom');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groupes', function (Blueprint $table) {
            $table->string('nom');
            $table->string('description')->nullable();
        });
    }
};
