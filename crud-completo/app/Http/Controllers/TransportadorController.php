<?php

namespace App\Http\Controllers;

use App\Models\Transportador;
use Illuminate\Http\Request;

class TransportadorController extends Controller
{

    public function index()
    {
        $transportadores = Transportador::all();

        return view('transportadores.index', ['transportadores' => $transportadores]);
    }

    public function create()
    {
        return view('transportadores.create');
    }

    public function store(Request $request)
    {
        // Validacao dos dados
        $request->validate([
            'nomeCompleto' => 'required',
            'celular' => 'required',
            'email' => 'required',
            'morada' => 'required',
            'areaActuacao' => 'required',
            'tipoEmpresa' => 'required',
            'cartaConducao' => 'required',
            'cartaValidade' => 'required',
            'metodoPagamento' => 'required',
            'contaPagamento' => 'required',
            'biFrontal' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028',
            'biTraseira' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028',
            'licensa' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);



        $transportador = new Transportador();

        // Tratamento da imagem vindo do form, guardando na pasta e pegado o caminho
        //1º Carta
        // Processamento dos dados...
        $extension = $request->cartaConducao->extension();
        // Faz uma hash e deixa o nome do arquivo único...
        $file_name_carta = md5(time() . '.' . request()->cartaConducao->getClientOriginalExtension()) . "." . $extension;
        request()->cartaConducao->move(public_path('images/cartas'), $file_name_carta);

        //2º BI Frontal
        $extension = $request->biFrontal->extension();
        // Faz uma hash e deixa o nome do arquivo único...
        $file_name_biFrontal = md5(time() . '.' . request()->biFrontal->getClientOriginalExtension()) . "." . $extension;
        request()->biFrontal->move(public_path('images/bi/frontal'), $file_name_biFrontal);

        //  3º BI Traseira
        $extension = $request->biTraseira->extension();
        // Faz uma hash e deixa o nome do arquivo único...
        $file_name_biTraseira = md5(time() . '.' . request()->biTraseira->getClientOriginalExtension()) . "." . $extension;
        request()->biTraseira->move(public_path('images/bi/traseiras'), $file_name_biTraseira);

        //  4º licensa
        $extension = $request->licensa->extension();
        // Faz uma hash e deixa o nome do arquivo único...
        $file_name_licensa = md5(time() . '.' . request()->licensa->getClientOriginalExtension()) . "." . $extension;
        request()->licensa->move(public_path('images/licensas'), $file_name_licensa);


        $transportador->nomeCompleto = $request->nomeCompleto;
        $transportador->celular = $request->celular;
        $transportador->telefone  = $request->telefone;
        $transportador->email = $request->email;
        $transportador->morada = $request->morada;
        $transportador->areaActuacao = $request->areaActuacao;
        $transportador->tipoEmpresa = $request->tipoEmpresa;
        $transportador->cartaValidade = $request->cartaValidade;
        $transportador->metodoPagamento = $request->metodoPagamento;
        $transportador->contaPagamento = $request->contaPagamento;
        //Guardando o caminho da imagem
        $transportador->cartaConducao = $file_name_carta;
        $transportador->biFrontal = $file_name_biFrontal;
        $transportador->biTraseira = $file_name_biTraseira;
        $transportador->licensa = $file_name_licensa;

        $transportador->save();
        return redirect()->route('transportadors.index')->with('success', 'Transportador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $transportador = Transportador::findOrFail($id);
        return view('transportadores.edit', ['transportador' => $transportador]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // Image Upload
        // Verifica se é o Arquivo que queremos
        if ($request->hasFile('cartaConducao') && $request->file('cartaConducao')->isValid()) {

            // Processamento dos dados...
            $requestImage = $request->cartaConducao;

            $extension = $requestImage->extension();

            // Faz uma hash e deixa o nome do arquivo único...
            $imageName = md5(time() . '.' . request()->cartaConducao->getClientOriginalExtension()) . "." . $extension;

            // Adiciona a imagem na pasta do server: Faz o upload
            $requestImage->move(public_path('images/cartas'), $imageName);

            //Adicionamos a imagem a propriedade:Image do objecto
            $data['cartaConducao'] = $imageName;
        }

        if ($request->hasFile('biFrontal') && $request->file('biFrontal')->isValid()) {

            // Processamento dos dados...
            $requestImage = $request->biFrontal;

            $extension = $requestImage->extension();

            // Faz uma hash e deixa o nome do arquivo único...
            $imageName = md5(time() . '.' . request()->biFrontal->getClientOriginalExtension()) . "." . $extension;

            // Adiciona a imagem na pasta do server: Faz o upload
            $requestImage->move(public_path('images/bi/frontal'), $imageName);

            //Adicionamos a imagem a propriedade:Image do objecto
            $data['biFrontal'] = $imageName;
        }

        if ($request->hasFile('biTraseira') && $request->file('biTraseira')->isValid()) {

            // Processamento dos dados...
            $requestImage = $request->biTraseira;

            $extension = $requestImage->extension();

            // Faz uma hash e deixa o nome do arquivo único...
            $imageName = md5(time() . '.' . request()->biTraseira->getClientOriginalExtension()) . "." . $extension;

            // Adiciona a imagem na pasta do server: Faz o upload
            $requestImage->move(public_path('images/bi/traseiras'), $imageName);

            //Adicionamos a imagem a propriedade:Image do objecto
            $data['biTraseira'] = $imageName;
        }

        if ($request->hasFile('licensa') && $request->file('licensa')->isValid()) {

            // Processamento dos dados...
            $requestImage = $request->licensa;

            $extension = $requestImage->extension();

            // Faz uma hash e deixa o nome do arquivo único...
            $imageName = md5(time() . '.' . request()->licensa->getClientOriginalExtension()) . "." . $extension;

            // Adiciona a imagem na pasta do server: Faz o upload
            $requestImage->move(public_path('images/licensas'), $imageName);

            //Adicionamos a imagem a propriedade:Image do objecto
            $data['licensa'] = $imageName;
        }

        Transportador::findOrFail($request->id)->update($data);

        return redirect()->route('transportadors.index')->with('success', 'Dados do Transportador ' . $data['nomeCompleto'] . ' foram actualizados com sucesso!');
    }


    public function destroy($id)
    {
        $transportador = Transportador::findOrFail($id);

        $image_path_Carta = public_path() . "/images/cartas/";
        $imageCarta = $image_path_Carta . $transportador->cartaConducao;
        if (file_exists($imageCarta)) {
            @unlink($imageCarta);
        }

        $image_path_biFrontal = public_path() . "/images/bi/frontal/";
        $imagebiFrontal = $image_path_biFrontal . $transportador->biFrontal;
        if (file_exists($imagebiFrontal)) {
            @unlink($imagebiFrontal);
        }

        $image_path_biTraseira = public_path() . "/images/bi/traseiras/";
        $imagebiTraseira = $image_path_biTraseira . $transportador->biTraseira;
        if (file_exists($imagebiTraseira)) {
            @unlink($imagebiTraseira);
        }

        $image_path_licensa = public_path() . "/images/licensas/";
        $imagelicensa = $image_path_licensa . $transportador->licensa;
        if (file_exists($imagelicensa)) {
            @unlink($imagelicensa);
        }

        $transportador->delete();
        return redirect('transportadors')->with('success', 'Transportador excluido com sucesso!');
    }
}
