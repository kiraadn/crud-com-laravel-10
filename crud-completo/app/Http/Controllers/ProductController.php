<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        $products = "Product list from in ProductController";

        return view('products.index', ['products' => $products]);
    }
}
