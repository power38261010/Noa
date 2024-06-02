<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CondicionIvaRepo;
use App\Models\CondicionIva;
use Illuminate\Http\Request;

class CondicionIvaController extends Controller {

    protected $condicionIvaRepo;

    public function __construct(CondicionIvaRepo $_condicionIvaRepo)
    {
        $this->condicionIvaRepo = $_condicionIvaRepo;
    }

    public function index(Request $request) {
        $search = $request->get('search') ?? '';
        $condicionesIva = $this->condicionIvaRepo->search($search);

        return view('condicion-ivas.index', compact('condicionesIva'));
    }

    public function create() {
        return view('condicion-ivas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:condicion_ivas,codigo',
            'condicion_iva' => 'required',
            'alicuota' => 'required|numeric',
        ]);

        CondicionIva::create($request->all());

        return redirect()->route('condicion-ivas.index')
            ->with('success', 'Condición de IVA creada exitosamente.');
    }

    public function edit($id) {
        $condicionIva = CondicionIva::findOrFail($id);
        return view('condicion-ivas.edit', compact('condicionIva'));
    }

    public function update(Request $request, $id) {
        $condicionIva = CondicionIva::findOrFail($id);

        $request->validate([
            'codigo' => 'required|unique:condicion_ivas,codigo,' . $condicionIva->id,
            'condicion_iva' => 'required',
            'alicuota' => 'required|numeric',
        ]);

        $condicionIva->update($request->all());

        return redirect()->route('condicion-ivas.index')
            ->with('success', 'Condición de IVA actualizada exitosamente.');
    }

    public function destroy(CondicionIva $condicionIva) {
        $condicionIva->delete();

        return redirect()->route('condicion-ivas.index')
            ->with('success', 'Condición de IVA eliminada exitosamente.');

    }
}
