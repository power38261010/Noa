<?php

namespace App\Http\Controllers;

use App\Models\ProductoServicio;
use App\Http\Repositories\ProductoServicioRepo;
use App\Models\Rubro;
use App\Models\UnidadMedida;
use App\Models\CondicionIva;
use Illuminate\Http\Request;
use App\Http\Helpers\ProductoServicioHelper;

class ProductoServicioController extends Controller {

    /**
     * @var ProductoServicioHelper
     */
    protected $parseHelper;
    /**
     * @var ProductoServicioRepo
     */
    protected $productServiceRepo;

    /**
     * ServiceParseHelper constructor.
     * @param ProductoServicioRepo $productServiceRepo
     */
    public function __construct(ProductoServicioRepo $_productServiceRepo,ProductoServicioHelper $_parseHelper)
    {
        $this->parseHelper = $_parseHelper;
        $this->productServiceRepo = $_productServiceRepo;
    }

    public function index(Request $request) {
        $search = $request->get('search') ?? '';
        $tipo = $request->get('tipo') ?? '';
        $id_rubro = $request->get('rubro') ?? 0;
        $id_condicion_iva = $request->get('condicion_iva') ?? 0;
        $id_unidad_medida = $request->get('unidad_medida') ?? 0;
        $date_filter = $request->get('date_filter') ?? '';

        $productosServicios = $this->productServiceRepo->search($search, $tipo, $id_rubro, $id_condicion_iva, $id_unidad_medida, $date_filter);
        $productosServiciosCollection = collect($productosServicios->items());
        // Calcular SumBruto y SumBrutoConIva
        $sumBruto = $productosServiciosCollection->sum(function($item) {
            return $item->precio_bruto_unitario;
        });

        $sumBrutoConIva = $productosServiciosCollection->sum(function($item) {
            return $item->precio_bruto_unitario + (($item->precio_bruto_unitario * $item->condicionIva->alicuota) / 100);
        });



        $rubros = Rubro::all();
        $unidadesMedida = UnidadMedida::all();
        $condicionesIva = CondicionIva::all();

        return view('productos_servicios.index', compact('productosServicios', 'rubros', 'unidadesMedida', 'condicionesIva', 'sumBruto', 'sumBrutoConIva'));
    }


    public function create() {
        $rubros = Rubro::all();
        $unidadesMedida = UnidadMedida::all();
        $condicionesIva = CondicionIva::all();

        return view('productos_servicios.create', compact('rubros', 'unidadesMedida', 'condicionesIva'));
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:producto_servicios,codigo|alpha_num',
            'producto_servicio' => 'required',
            'id_rubro' => 'required|exists:rubros,id',
            'id_condicion_iva' => 'required|exists:condicion_ivas,id',
            'id_unidad_medida' => 'required|exists:unidad_medidas,id',
        ]);

        ProductoServicio::create($request->all());

        return redirect()->route('productos-servicios.index')
                ->with('success', 'Producto/Servicio creado exitosamente.');
    }

    public function show($id) {
        $productoServicioaux = ProductoServicio::findOrFail($id);
        $productoServicio = $this->parseHelper->parseProductoServicio($productoServicioaux);

        return view('productos_servicios.show', compact('productoServicio'));
    }

    public function edit($id) {
        $productoServicioaux = ProductoServicio::findOrFail($id);
        $productoServicio = $this->parseHelper->parseProductoServicio($productoServicioaux);
        $rubros = Rubro::all();
        $unidadesMedida = UnidadMedida::all();
        $condicionesIva = CondicionIva::all();
        return view('productos_servicios.edit', compact('productoServicio', 'rubros', 'unidadesMedida', 'condicionesIva'));
    }

    public function update(Request $request, $id) {
        $productoServicio = ProductoServicio::findOrFail($id);

        $request->validate([
            'codigo' => 'required|alpha_num|unique:producto_servicios,codigo,' . $productoServicio->id,
            'producto_servicio' => 'required',
        ]);

        $productoServicio->update($request->all());

        return redirect()->route('productos-servicios.index')
                ->with('success', 'Producto/Servicio actualizado exitosamente.');
    }

    public function destroy(ProductoServicio $productoServicio) {
        $productoServicio->delete();

        return redirect()->route('productos-servicios.index')
            ->with('success', 'Producto/Servicio eliminado exitosamente.');
    }
}

