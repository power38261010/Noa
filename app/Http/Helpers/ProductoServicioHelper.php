<?php

namespace App\Http\Helpers;

use App\Models\CondicionIva;
use App\Models\ProductoServicio;
use App\Models\UnidadMedida;
use App\Models\Rubro;
use App\DTO\ProductoServicioDTO;
use App\DTO\RubroDTO;
use App\DTO\UnidadMedidaDTO;
use App\DTO\CondicionIvaDTO;

class ProductoServicioHelper
{
    public function parseProductoServicio(ProductoServicio $productoServicio) {
        return new ProductoServicioDTO(
            $productoServicio->id,
            $productoServicio->tipo,
            $productoServicio->codigo,
            $productoServicio->producto_servicio,
            $productoServicio->precio_bruto_unitario,
            $this->parseRubro($productoServicio->rubro),
            $this->parseUnidadMedida($productoServicio->unidadMedida),
            $this->parseCondicionIva($productoServicio->condicionIva)
        );
    }

    public function parseCondicionIva(CondicionIva $condicionIva) {
        return new CondicionIvaDTO(
            $condicionIva->id,
            $condicionIva->codigo,
            $condicionIva->condicion_iva,
            $condicionIva->alicuota
        );
    }

    public function parseUnidadMedida(UnidadMedida $unidadMedida) {
        return new UnidadMedidaDTO(
            $unidadMedida->id,
            $unidadMedida->codigo,
            $unidadMedida->unidad_medida
        );
    }

    public function parseRubro(Rubro $rubro) {
        return new RubroDTO(
            $rubro->id,
            $rubro->rubro
        );
    }
}
