<?php

namespace App\Exports;

use App\Productos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductosExport implements FromQuery
{
    public function __construct(int $page)
    {
        $this->page = $page;
    }
    

    public function query()
    {
        if($this->page==1){
            $ini = $this->page;
            $fin = $this->page + 24;
        }else{
            $ini = (($this->page -1) *25) +1;
            $fin = $ini +24;
        }

        return Productos::query()->where('id',  '>=', $ini)->where('id',  '<=', $fin);
    }
}
