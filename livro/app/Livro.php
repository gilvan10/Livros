<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Livro extends Model
{
    public static function listaLivros($paginate){

        $listaLivros = DB::table('livros')
            ->join('users','users.id','=','livros.id_usuario')
            ->select('livros.id','livros.de_livro','livros.usuario')
            ->paginate($paginate);

        return $listaLivros;
    }

}
