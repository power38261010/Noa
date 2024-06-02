<?php

namespace App\DTO;

class ProductoServicioDTO {
    public $id;
    public $tipo;
    public $codigo;
    public $producto_servicio;
    public $precio_bruto_unitario;
    public $rubro;
    public $unidadMedida;
    public $condicionIva;

    public function __construct($id, $tipo, $codigo, $producto_servicio, $precio_bruto_unitario, $rubro, $unidadMedida, $condicionIva) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->codigo = $codigo;
        $this->producto_servicio = $producto_servicio;
        $this->precio_bruto_unitario = $precio_bruto_unitario;
        $this->rubro = $rubro;
        $this->unidadMedida = $unidadMedida;
        $this->condicionIva = $condicionIva;
    }
}