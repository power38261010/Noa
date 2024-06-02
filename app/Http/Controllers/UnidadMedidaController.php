<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UnidadMedidaRepo;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller {

    protected $unidadMedidaRepo;

    public function __construct(UnidadMedidaRepo $_unidadMedidaRepo)
    {
        $this->unidadMedidaRepo = $_unidadMedidaRepo;
    }

    public function index(Request $request) {
        $search = $request->get('search') ?? '';
        $unidadesMedida = $this->unidadMedidaRepo->search($search);

        return view('unidad-medidas.index', compact('unidadesMedida'));
    }

    public function create() {
        return view('unidad-medidas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:unidad_medidas,codigo',
            'unidad_medida' => 'required',
        ]);

        UnidadMedida::create($request->all());

        return redirect()->route('unidad-medidas.index')
            ->with('success', 'Unidad de Medida creada exitosamente.');
    }

    public function edit($id) {
        $unidadMedida = UnidadMedida::findOrFail($id);
        return view('unidad-medidas.edit', compact('unidadMedida'));
    }

    public function update(Request $request, $id) {
        $unidadMedida = UnidadMedida::findOrFail($id);

        $request->validate([
            'codigo' => 'required|unique:unidad_medidas,codigo,' . $unidadMedida->id,
            'unidad_medida' => 'required',
        ]);

        $unidadMedida->update($request->all());

        return redirect()->route('unidad-medidas.index')
            ->with('success', 'Unidad de Medida actualizada exitosamente.');
    }

    public function destroy(UnidadMedida $unidadMedida) {
        $unidadMedida->delete();

        return redirect()->route('unidad-medidas.index')
            ->with('success', 'Unidad de Medida eliminada exitosamente.');
    }
}
