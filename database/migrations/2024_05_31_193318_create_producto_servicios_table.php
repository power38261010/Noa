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
        Schema::create('producto_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_rubro')->constrained('rubros');
            $table->foreignId('id_unidad_medida')->constrained('unidad_medidas');
            $table->foreignId('id_condicion_iva')->constrained('condicion_ivas');
            $table->char('tipo', 1);
            $table->string('codigo', 20)->unique();
            $table->string('producto_servicio', 25);
            $table->decimal('precio_bruto_unitario', 30, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_servicios');
    }
};
