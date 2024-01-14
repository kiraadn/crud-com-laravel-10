<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public readonly Customer $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }


    public function index()
    {
        //
    }

    public function customers()
    {
        $customers = Customer::all();
        // $data['getRecord'] = Customer::get();
        return view('admin.customers.list', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create = add_customers (in tutorial) | create = add
        return  view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //route inser_add_customers = store
        $save = $this->customer;

        $save->nomeCompleto = trim($request->nomeCompleto);
        $save->telefone = trim($request->telefone);
        $save->endereco = trim($request->endereco);
        $save->nomeMedico = trim($request->nomeMedico);
        $save->enderecoMedico = trim($request->enderecoMedico);
        $save->save();

         if($save){
            return redirect()->route('customers.customers')->with('success', 'Cliente '. $save['nomeCompleto'] .' cadastrado com sucesso!');
         }

         return redirect()->back()->with('error', 'Error created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
         //Vai redirecionar a pagina para editar os dados, dados que proveem da BD
         return view('admin.customers.edit', ['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nomeCompleto' => 'required',
            'telefone' => 'required',
            'nomeMedico' => 'required'
        ]);

        $customer = Customer::find($customer->id);

        if($customer){
            $customer->nomeCompleto = trim($request->nomeCompleto) ?? 'Valor Padrao';
            $customer->telefone = trim($request->telefone) ?? 'Valor Padrao';
            $customer->endereco = trim($request->endereco) ?? 'Valor Padrao';
            $customer->nomeMedico = trim($request->nomeMedico) ?? 'Valor Padrao';
            $customer->enderecoMedico = trim($request->enderecoMedico) ?? 'Valor Padrao';

            $customer->update();

            return redirect()->route('customers.customers')->with('success', 'Cliente ' . $customer->nomeCompleto . ' foi actualizado com sucesso!');
        } else {

            return redirect()->route('customers.customers')->with('error', 'Não foi possível actualizar dados do Cliente ' . $customer->nomeCompleto . '!');

        }

          }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Customer::find($id);

        if($delete){

            $delete->delete();

            return redirect()->route('customers.customers')->with('success', 'Cliente foi removido com sucesso!');
        } else {

            return redirect()->route('customers.customers')->with('error', 'Não foi possível remover o  Cliente!');

        }

    }
}
