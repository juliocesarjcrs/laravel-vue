<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductosController extends Controller
{
    public function listar_productos(Request $request)
      {
          try {
             
            $productos = Productos::paginate(25);
            return ['productos' => $productos];

          } catch (\Exception $e) {
            return $this->handleError($e, 'Error en listar_productos');
          }
      }
      public function exportar_productos(Request $request)
        {
            try {
            $page = intval($request->input('page'));
            $productosExport = new ProductosExport($page);
            return Excel::download($productosExport, "productos-$page.xlsx");
               
            } catch (\Exception $e) {
                return $this->handleError($e, 'Error en exportar_productos ');
            }
        }
}
