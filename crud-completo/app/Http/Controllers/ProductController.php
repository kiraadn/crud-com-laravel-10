<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {

        $keyword = $request->get('search');
        $perPage = 5;

        if(!empty($keyword)){
            $products = Product::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('category', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        return view('products.index', ['products' => $products])->with('i',(request()->input('page', 1) -1) *5);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validacao dos dados
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $product = new Product;

        // Tratamento da imagem vindo do form, guardando na pasta e pegado o caminho
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product->name = $request->name;
        $product->description = $request->description;
        //Guardando o caminho da imagem
        $product->image = $file_name;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product Added sucessfuly!');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product'=> $product]);
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $file_name = $request->hidden_product_image;

        if($request->image !=''){
              // Tratamento da imagem vindo do form, guardando na pasta e pegado o caminho
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        $product = Product::find($request->hidden_id);



            $product->name = $request->name;
            $product->description = $request->description;
            //Guardando o caminho da imagem
            $product->image = $file_name;
            $product->category = $request->category;
            $product->quantity = $request->quantity;
            $product->price = $request->price;

            $product->update();

            return redirect()->route('products.index')->with('success', 'Product ' . $product->name . ' has been updated successfully!');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $image_path = public_path()."/image/";
        $image = $image_path. $product->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $product->delete();
        return redirect('products')->with('success', 'Product deleted!');
    }

}
