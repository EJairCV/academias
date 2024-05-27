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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            

            $table->unsignedBigInteger('id_docente')->nullable();
            $table->unsignedBigInteger('id_campo')->nullable();
            
            $table->foreign('id_docente')
                    ->references('id')
                    ->on('docente')
                    ->onDelete('set null');

             $table->foreign('id_campo')
                     ->references('id')
                     ->on('campos')
                    ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
