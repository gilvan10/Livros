<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Livro extends Model
{

    protected $fillable = ['ds_livro','id_usuario'];

    public static function listaLivros($paginate){

        $listaLivros = DB::table('livros')
            ->join('users','users.id','=','livros.id_usuario')
            ->select('livros.id','livros.ds_livro','livros.id_usuario')
            ->paginate($paginate);

        return $listaLivros;
    }

}
