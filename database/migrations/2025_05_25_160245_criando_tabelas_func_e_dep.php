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
        //
        Schema::create('funcionarios' , function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->decimal('salario',8,2);
            $table->string('cargo');
            $table->integer('departamento_id');
            $table->timestamps();
        });

        Schema::create('departamentos' , function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('funcionario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
