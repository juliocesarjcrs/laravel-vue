<?php

use Illuminate\Database\Seeder;
use App\Imports\ProductosImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // $registros = base_path() . '/database/excel/codigo_medicamentos.csv';
            $registros = base_path() . '/database/excel/codigoMedicamentos.csv';
            // var_dump($registros);
            Excel::import(new ProductosImport, $registros);
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
