<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model {
    use HasFactory;

    protected $fillable = [
        'tipo',
        'codigo',
        'producto_servicio',
        'precio_bruto_unitario',
        'id_rubro',
        'id_condicion_iva',
        'id_unidad_medida'
    ];

    // ------------------------------------------------------
    // Relations
    // ------------------------------------------------------

    public function rubro() {
        return $this->belongsTo(Rubro::class, 'id_rubro');
    }

    public function unidadMedida() {
        return $this->belongsTo(UnidadMedida::class, 'id_unidad_medida');
    }

    public function condicionIva() {
        return $this->belongsTo(CondicionIva::class, 'id_condicion_iva');
    }
}
