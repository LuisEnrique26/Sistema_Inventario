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
        Schema::create('producto_proveedor', function (Blueprint $table) {
            $table->bigIncrements('id_producto_proveedor');
            $table->bigInteger('id_producto');
            $table->bigInteger('id_proveedor');
            $table->bigInteger('id_usuario');
            $table->string('fecha', 50);
            $table->string('costo', 50);
            $table->string('cantidad', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_proveedor');
    }
};
