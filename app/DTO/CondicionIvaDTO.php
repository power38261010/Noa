<?php

namespace App\DTO;

class CondicionIvaDTO {
  public $id;
  public $codigo;
  public $condicion_iva;
  public $alicuota;

  public function __construct($id, $codigo, $condicion_iva, $alicuota) {
      $this->id = $id;
      $this->codigo = $codigo;
      $this->condicion_iva = $condicion_iva;
      $this->alicuota = $alicuota;
  }
}