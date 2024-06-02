<?php

namespace App\DTO;

class UnidadMedidaDTO {
  public $id;
  public $codigo;
  public $unidad_medida;

  public function __construct($id, $codigo, $unidad_medida) {
      $this->id = $id;
      $this->codigo = $codigo;
      $this->unidad_medida = $unidad_medida;
  }
}
