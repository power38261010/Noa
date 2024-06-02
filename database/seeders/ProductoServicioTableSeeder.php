<?php

namespace Database\Seeders;

use App\Models\CondicionIva;
use App\Models\Rubro;
use App\Models\UnidadMedida;
use App\Models\ProductoServicio;
use Illuminate\Database\Seeder;

class ProductoServicioTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->_addCondicionIva('001', 'General', 21.8);
        $this->_addCondicionIva('002', 'Importacion', 24.8);
        $this->_addCondicionIva('003', 'Exportacion', 31.8);

        $this->_addRubro('Tecnología');
        $this->_addRubro('Argonomia');
        $this->_addRubro('Metalurgico');

        $this->_addUnidadMedida('001', 'Pascal');
        $this->_addUnidadMedida('002', 'Tonelada');
        $this->_addUnidadMedida('002', 'KM');

        $this->_addProductoServicio("PS1", "Prensa Hidraulica", "P", "Metalurgico", "001", "002", 2222.8);
        $this->_addProductoServicio("PS2", "Soja", "P", "Argonomia", "002", "003", 2222000);
        $this->_addProductoServicio("PS3", "Services Car", "S", "Tecnología", "002", "001", 2222.8);
    }

    /**
     * @param string $codigo
     * @param string $condicion_iva
     * @param float $alicuota
     * @return CondiciomIva
     */
    protected function _addCondicionIva(string $codigo, string $condicion_iva, float $alicuota) {

        $ci = new CondicionIva();
        $ci->codigo = $codigo;
        $ci->condicion_iva = $condicion_iva;
        $ci->alicuota = $alicuota;
        $ci->save();

        return $ci;
    }

    /**
     * @param string $rubro
     * @return Rubro
     */
    protected function _addRubro(string $rubro) {
        $r = new Rubro();
        $r->rubro = $rubro;
        $r->save();
        return $r;
    }

    protected function _addUnidadMedida(string $codigo, string $unidad_medida) {
        $um = new UnidadMedida();
        $um->codigo = $codigo;
        $um->unidad_medida = $unidad_medida;
        $um->save();

        return$um;
    }

    /**
     * @param string $codigo
     * @param string $producto_servicio
     * @param string $tipo
     * @param string $rubro
     * @param string $unidad_medida
     * @param string $condicion_iva
     * @param float $precio_bruto_unitario
     * @return ProductoServicio
     */
    protected function _addProductoServicio(string $codigo, string $producto_servicio, string $tipo, string $rubro, string $unidad_medida, string $condicion_iva, float $precio_bruto_unitario) {
        $rubroId = Rubro::where('rubro', $rubro)->first()->id;
        $unidadMedidaId = UnidadMedida::where('codigo', $unidad_medida)->first()->id;
        $condicionIvaId = CondicionIva::where('codigo', $condicion_iva)->first()->id;

        $ps = new ProductoServicio();
        $ps->codigo = $codigo;
        $ps->producto_servicio = $producto_servicio;
        $ps->tipo = $tipo;
        $ps->id_rubro = $rubroId;
        $ps->id_unidad_medida = $unidadMedidaId;
        $ps->id_condicion_iva = $condicionIvaId;
        $ps->precio_bruto_unitario = $precio_bruto_unitario;
        $ps->save();

        return $ps;
    }

}
