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
        Schema::create('todo', function (Blueprint $table) {
            $table->id();
            $table->string('tache');
            $table->string('description')->nullable();
            $table->boolean('fini');
            $table->dateTime('dateDeFin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo');
    }
};
