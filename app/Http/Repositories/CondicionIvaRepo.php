<?php

namespace App\Http\Repositories;

use App\Models\CondicionIva;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CondicionIvaRepo extends BaseRepo {

    public function getModel() {
        return new CondicionIva();
    }

    public function search(string $search = '') {
        $qry = CondicionIva::query();

        if ($search != '') {
            $qry->where('condicion_iva', 'like', "%$search%")
                ->orWhere('codigo', 'like', "%$search%");
        }
        return $qry->simplePaginate(10);
    }
}
