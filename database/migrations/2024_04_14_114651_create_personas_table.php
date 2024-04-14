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
        Schema::create('personas', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_persona');
            $table->string('apellido', 100)->default('');
            $table->string('nombre', 100)->default('');
            $table->unsignedBigInteger('articulo_id');
            $table->primary('cod_persona');
            $table->foreign('articulo_id')->references('id')->on('articulos')
                   ->onDelete('cascade') 
                   ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
