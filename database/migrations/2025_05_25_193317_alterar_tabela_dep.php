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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);

            $table->unsignedBigInteger('departamento_id')->nullable()->change();

            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('set null');
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
