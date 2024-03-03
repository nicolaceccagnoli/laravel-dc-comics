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
        Schema::create('comics', function (Blueprint $table) {

            // Definiamo la struttura della Tabella Comics del nostro Database
            $table->id();
            $table->string('title', 64);
            $table->text('description')->nullable();
            $table->string('thumb', 1024)->nullable();
            $table->float('price', 5, 2)->nullable();
            $table->string('series', 64);
            $table->date('sale_date')->nullable();
            $table->string('type', 32);
            $table->text('artists');
            $table->text('writers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
