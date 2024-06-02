<?php

namespace App\Http\Repositories;

use App\Models\UnidadMedida;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UnidadMedidaRepo extends BaseRepo {

    public function getModel() {
        return new UnidadMedida();
    }

    public function search(string $search = '') {
        $qry = UnidadMedida::query();

        if ($search != '') {
            $qry->where('unidad_medida', 'like', "%$search%")
                ->orWhere('codigo', 'like', "%$search%");
        }

        return $qry->simplePaginate(10);
    }
}
