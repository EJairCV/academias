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
        Schema::create('clases_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clases_id')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();

            $table->foreign('clases_id')
                    ->references('id')
                    ->on('clases')
                    ->onDelete('set null');

            $table->foreign('usuario_id')
                    ->references('id')
                    ->on('usuario')
                    ->onDelete('set null');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases_usuario');
    }
};
