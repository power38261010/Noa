<?php

namespace App\Http\Repositories;

use App\Models\Rubro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RubroRepo extends BaseRepo
{
    public function getModel()
    {
        return new Rubro();
    }

    public function search(string $search = '') {
        $qry = Rubro::query();

        if ($search != '') {
            $qry->where('rubro', 'like', "%$search%");
        }

        return $qry->simplePaginate(10);
    }
}
