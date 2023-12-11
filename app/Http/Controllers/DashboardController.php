<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $totales = [
            'sales' => Venta::count(),
            'products' => Producto::count(),
            'clients' => Cliente::count(),
            'categories' => Categoria::count()
        ];
        return view('dashboard', compact(  'totales'));
    }
}
