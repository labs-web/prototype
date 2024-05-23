<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->date('dateDebut')->nullable()->after('priorité');
        });
    }

    public function down(): void
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->dropColumn('dateDebut');
        });
    }
};