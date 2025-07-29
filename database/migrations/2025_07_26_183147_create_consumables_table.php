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
        Schema::create('consumables', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name')->unique();
            $table->json('description');
            $table->integer('stock');
            $table->string('unidade')->nullable();
            $table->dateTime('validade')->nullable();
            $table->dateTime('entry_date');
            $table->dateTime('last_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumables');
    }
};
