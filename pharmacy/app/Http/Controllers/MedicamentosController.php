<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function medicamentos()
    {
        $medicamentos = Medicamento::where('isDeleted', '=', 0)->get();
        return view('admin.medicamentos.index', ['medicamentos' => $medicamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
    //    $medicamentos = new Medicamento();

       $SaveUpdate = new Medicamento;
       $SaveUpdate->name = $request->name;
       $SaveUpdate->packing = $request->packing;
       $SaveUpdate->generic_name = $request->generic_name;
       $SaveUpdate->nome_fornecedor = $request->nome_fornecedor;
       $SaveUpdate->data_validade = $request->data_validade;
       $SaveUpdate->descricao = $request->descricao;
       $SaveUpdate->save();

       return redirect()->route('medicamentos.medicamentos')->with('success', 'Medicamento adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        return view('admin.medicamentos.edit', ['medicamento' => $medicamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $SaveUpdate = Medicamento::findOrFail($id);
        $SaveUpdate->name = $request->name;
        $SaveUpdate->packing = $request->packing;
        $SaveUpdate->generic_name = $request->generic_name;
        $SaveUpdate->nome_fornecedor = $request->nome_fornecedor;
        $SaveUpdate->data_validade = $request->data_validade;
        $SaveUpdate->descricao = $request->descricao;
        $SaveUpdate->update();

        return redirect()->route('medicamentos.medicamentos')->with('success', 'Medicamento Actualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

        // echo $id; die();
        $delete = Medicamento::findOrFail($id);

        if($delete){
            $delete->isDeleted = 1;
            $delete->save();

            return redirect()->back()->with('success', 'Medicamento removido com sucesso!');
        } else {

            return redirect()->back()->with('error', 'Não foi possível remover o  Medicamento!');

        }

    }


    public function stock()
    {
        return view('admin.medicamentos_stock.index');
    }
}
