<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use App\Http\Repositories\RubroRepo;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    protected $rubroRepo;

    public function __construct(RubroRepo $rubroRepo)
    {
        $this->rubroRepo = $rubroRepo;
    }

    public function index(Request $request)
    {
        $search = $request->get('search') ?? '';
        $rubros = $this->rubroRepo->search($search);

        return view('rubros.index', compact('rubros'));
    }

    public function create()
    {
        return view('rubros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rubro' => 'required|unique:rubros,rubro',
        ]);

        Rubro::create($request->all());

        return redirect()->route('rubros.index')->with('success', 'Rubro creado exitosamente.');
    }

    public function show($id)
    {
        $rubro = Rubro::findOrFail($id);

        return view('rubros.show', compact('rubro'));
    }

    public function edit($id)
    {
        $rubro = Rubro::findOrFail($id);

        return view('rubros.edit', compact('rubro'));
    }

    public function update(Request $request, $id)
    {
        $rubro = Rubro::findOrFail($id);

        $request->validate([
            'rubro' => 'required|unique:rubros,rubro,' . $rubro->id,
        ]);

        $rubro->update($request->all());

        return redirect()->route('rubros.index')->with('success', 'Rubro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $rubro = Rubro::findOrFail($id);
        $rubro->delete();

        return redirect()->route('rubros.index')->with('success', 'Rubro eliminado exitosamente.');
    }
}
