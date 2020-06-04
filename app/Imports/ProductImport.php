<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'long_description' => $row[3],
            'stock' => $row[4],
            'status' => $row[5],
            'provider' => $row[6],
            'provider_code' => $row[7],
            'lote' => $row[8],
            'price' => $row[9],
            'purchase_price' => $row[10],
            'category_id' => $row[11],

        ]);
    }
}
