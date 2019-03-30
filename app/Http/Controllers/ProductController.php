<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

class ProductController extends Controller
{
    protected $path = 'storage/app/public/products.json';

    public function index() {
        $products = [];

        if ( File::exists(base_path($this->path))) {
            $products = File::get(base_path($this->path));
            $products = json_decode($products, true);
        }

        return view('index', compact('products'));
    }

    public function add() {

        $name = trim(strip_tags(request('name')));
        $quantity = abs(request('quantity'));
        $price = abs(request('price'));

        if (!empty($name) && !empty($quantity) && !empty($price)) {

            $data = [
                'name' => $name,
                'quantity' => $quantity,
                'price' => $price,
                'datetime' => date('m/d/Y H:i:s'),
                'total' => number_format($quantity * $price, 2)
            ];

            if ( File::exists(base_path($this->path))) {
                $products = File::get(base_path($this->path));
                $products = json_decode($products);
            } else {
                $products = [];
            }
    
            array_push($products, $data);
    
            $products = json_encode($products, JSON_PRETTY_PRINT);
    
            File::put(base_path($this->path), $products);
    
            return response()->json([
                'result' => $products
            ]);
        }

        return response()->json([
            'result' => 'Error'
        ]);
    }
}
