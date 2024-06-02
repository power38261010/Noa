<?php

namespace App\DTO;

class RubroDTO {
  public $id;
  public $rubro;

  public function __construct($id, $rubro) {
      $this->id = $id;
      $this->rubro = $rubro;
  }
}