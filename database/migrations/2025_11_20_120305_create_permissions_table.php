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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            //user id foreign key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //datetime permission granted
            $table->date('date_permission');
            //reason for permission
            $table->text('reason');
            //image proof
            $table->string('image')->nullable();
            //is_approved boolean
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
