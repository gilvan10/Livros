<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Livro;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Quando era carregado em memória
        $listaLivros = json_encode([
            ["id" => "1", "ds_livro" => "Java", "id_usuario" => "1"],
            ["id" => "2", "ds_livro" => "Php", "id_usuario" => "1"]
        ]);*/
        //Vindo do banco de dados
        $listaLivros = json_encode(Livro::select('id','ds_livro','id_usuario')->get());

        return view('admin.livros.index',compact('listaLivros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $data = $request->all();

        //validação
        $validacao = \Validator::make($data,[
            "ds_livro" => "required",
            "id_usuario" => "required",

        ]);

        if($validacao->fails()){
            //back() retorna para a pagina anterior, withErros mostras erros
            //withInput coloca os dados que foram digitados no formulario;
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Livro::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Livro::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Livro::find($id)->delete();
        return redirect()->back();
    }
}
