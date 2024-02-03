<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Http\Requests\UpdateFornecedorRequest;
use Illuminate\Http\Request;


class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function fornecedores()
    {
        $fornecedores = Fornecedor::get();
        return view('admin.dashboard.fornecedores.index', ['fornecedores' => $fornecedores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'suppliers_name' => 'required',
            'suppliers_email' => 'required',
            'contact_number' => 'required',
            'address' => 'required'
        ]);

         $save = new Fornecedor;

         $save->suppliers_name = trim($request->suppliers_name);
         $save->suppliers_company = trim($request->suppliers_company);
         $save->suppliers_email  = trim($request->suppliers_email) ;
         $save->contact_number  = trim($request->contact_number) ;
         $save->celphone = trim($request->celphone);
         $save->address = trim($request->address);
         $save->save();

         return redirect()->route('fornecedores.fornecedor')->with('success', 'Fornecedor ' . $request->suppliers_name . ' cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('admin.dashboard.fornecedores.edit', ['fornecedor' => $fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'suppliers_name' => 'required',
            'suppliers_email' => 'required',
            'contact_number' => 'required',
            'address' => 'required'
        ]);

         $save = new Fornecedor;

         $data = $request->all();
         Fornecedor::findOrFail($id)->update($data);


         return redirect()->route('fornecedores.fornecedor')->with('success', 'Fornecedor ' . $request->suppliers_name . ' actualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Fornecedor::findOrFail($id);
        $delete->delete();


        if($delete){

            $delete->delete();

            return redirect()->back()->with('success', 'Fornecedor removido com sucesso!');
        } else {

            return redirect()->route('fornecedores.fornecedor')->with('error', 'Não foi possível remover o  Fornecedor!');

        }
    }
}
