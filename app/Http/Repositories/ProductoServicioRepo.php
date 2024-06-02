<?php

namespace App\Http\Repositories;

use App\Models\ProductoServicio;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Carbon\Carbon;


class ProductoServicioRepo extends BaseRepo {

    /**
     * @return ProductoServicio|mixed
     */
    public function getModel() {
        return new ProductoServicio();
    }

    public function search(string $search = '', string $tipo = "", int $id_rubro = 0, int $id_condicion_iva = 0, int $id_unidad_medida = 0, string $date_filter = '') {
        $qry = ProductoServicio::query()
            ->with(['rubro', 'unidadMedida', 'condicionIva']);

        // Filtros
        if ($tipo) {
            $qry->where('tipo', $tipo);
        }
        if ($id_rubro) {
            $qry->where('id_rubro', $id_rubro);
        }
        if ($id_condicion_iva) {
            $qry->where('id_condicion_iva', $id_condicion_iva);
        }
        if ($id_unidad_medida) {
            $qry->where('id_unidad_medida', $id_unidad_medida);
        }

        // Filtro de fecha
        if ($date_filter) {
            switch ($date_filter) {
                case 'today':
                    $qry->whereDate('created_at', Carbon::today());
                    break;
                case 'week':
                    $qry->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'month':
                    $qry->whereMonth('created_at', Carbon::now()->month);
                    break;
                case 'year':
                    $qry->whereYear('created_at', Carbon::now()->year);
                    break;
            }
        }

        if ($search != '') {
            $qry->where(function ($qry) use ($search) {
                $qry->where('producto_servicio', 'like', "%$search%")
                    ->orWhere('codigo', 'like', "%$search%");
            });
        }

        return $qry->simplePaginate(10);
    }

}
