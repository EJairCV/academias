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
        Schema::create('equipo_evento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id')->nullable();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->foreign('evento_id')
                    ->references('id')
                    ->on('eventos')
                    ->onDelete('set null');
                    $table->foreign('equipo_id')
                    ->references('id')
                    ->on('equipos')
                    ->onDelete('set null');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_evento');
    }
};
