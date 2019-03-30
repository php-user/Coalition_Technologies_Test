<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    public function index() {
        $products = file_get_contents(base_path('storage/app/public/products/products.js'));
        $products = json_decode($products, true);

        //$products = str_replace('"', '', $products);
        //$products = array($products);

        dd($products);
        //$products = [];
        return view('index', compact('products'));
    }

    public function add() {

        $name = request('name');
        $quantity = request('quantity');
        $price = request('price');

        $data = [
            'name' => $name,
            'quantity' => $quantity,
            'price' => $price,
            'datetime' => date('m/d/Y H:m:s'),
            'total' => $quantity * $price
        ];

        $data = json_encode($data);

        

        file_put_contents(base_path('storage/app/public/products/products.js'), $data,  FILE_APPEND);

        $products = file_get_contents(base_path('storage/app/public/products/products.js'));

        


        return response()->json([
            'result' => $products
           
        ]);
    }
}
