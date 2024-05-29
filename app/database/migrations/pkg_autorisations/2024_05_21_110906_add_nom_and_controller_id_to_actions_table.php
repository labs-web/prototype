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
            $table->unsignedBigInteger('controller_id')->nullable(); // Ensure 'controller_id' is not nullable
            $table->unsignedBigInteger('permission_id')->nullable(); // Added unique constraint and nullable property
            $table->unsignedBigInteger('parent_action_id')->nullable(); // Self-referential relationship
            
            // Adding foreign keys
            $table->foreign('controller_id')->references('id')->on('controllers')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade'); // Added foreign key for permission
            $table->foreign('parent_action_id')->references('id')->on('actions')->onDelete('cascade'); // Self-referential relationship
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actions', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['controller_id']);
            $table->dropForeign(['permission_id']);
            $table->dropForeign(['parent_action_id']);
            
            // Drop columns
            $table->dropColumn('controller_id');
            $table->dropColumn('permission_id');
            $table->dropColumn('parent_action_id');
            $table->dropColumn('nom');
        });
    }
};

