<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\StockMedicamento;
use Illuminate\Http\Request;

class StockMedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stock()
    {
        $stocks = StockMedicamento::get();
        return view('admin.medicamentos_stock.index', ['stocks' => $stocks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicamentos = Medicamento::where('isDeleted', '=', 0)->get();
        return view('admin.medicamentos_stock.create', ['medicamentos' => $medicamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $save = new StockMedicamento;

       $save->id_medicamento = $request->id_medicamento;
    //    $save->batch_id = str()    $request->batch_id;
       $save->expiry_date = $request->expiry_date;
       $save->quantity = $request->quantity;
       $save->mrp = $request->mrp;
       $save->rate = $request->rate;
       $save->save();

       return redirect()->back()->with('success', 'Medicamento adicionado ao stock com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $medicamentos = Medicamento::where('isDeleted', '=', 0)->get();
        $stock = StockMedicamento::findOrFail($id);
        $data = [
            'medicamentos' => $medicamentos,
            'stock' => $stock
        ];
        return view('admin.medicamentos_stock.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        StockMedicamento::findOrFail($id)->update($data);

        return redirect()->route('medicamentos.stock')->with('success', 'Stock de Medicamento actualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = StockMedicamento::findOrFail($id);
        $delete->delete();

        return redirect()->back()->with('success', 'Stock de Medicamento removido com sucesso!');

    }
}
