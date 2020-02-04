@extends('layouts.app')

@section('content')
    <pagina tamanho="12">

        @if($errors->all())
            @foreach ($errors->all() as $key => $value)
                <li>{{$value}}</li>
            @endforeach
        @endif

        <painel titulo="Lista de Livros">


            <!--<modal-link tipo="link" nome="meuModalTeste" titulo="Cria" css=""></modal-link>-->

            <!--Bulma <button class="modal-close is-large" aria-label="close"></button>-->
            <tabela-lista
                    v-bind:titulos="['id','titulo','autor']"
                    v-bind:itens="{{$listaLivros}}"
                    criar="#criar" detalhe="/admin/livros/" editar="#editar" deletar="#deletar" token="12345678"
                    modal="sim"

            ></tabela-lista>


        </painel>
    </pagina>
    <modal nome="adicionar">
        <painel titulo="Adicionar">
            <formulario id="formAdicionar" css="" action="{{route('livros.store')}}" method="post" enctype="" token="{{ csrf_token() }}" >

                    <div class="form-group">
                        <label for="ds_livro">Ds_Livro</label><br>
                        <input type="text" class="form-control"  name="ds_livro" id="ds_livro"  placeholder="Ds_Livro" value="{{old('ds_livro')}}">

                    </div>
                    <div class="form-group">
                        <label for="id_usuario">Id Usuario</label><br>
                        <input type="int" class="form-control" name="id_usuario" id="id_usuario" placeholder="Id Usuario" value="{{old('id_usuario')}}">
                    </div>

                    <button form="formAdicionar" class="btn btn-primary">Adicionar</button>
            </formulario>
        </painel>
    </modal>
    <modal nome="editar">
        <painel titulo="Editar">
            <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="12345" >

                <div class="form-group">
                    <label for="ds_livro">Ds_Livro</label><br>
                    <input type="text" class="form-control"  name="ds_livro" id="ds_livro" v-model="$store.state.item.ds_livro"  placeholder="Enter Ds_Livro">

                </div>
                <div class="form-group">
                    <label for="id_usuario">Id Usuario</label><br>
                    <input type="int" class="form-control" name="id_usuario" id="id_usuario" v-model="$store.state.item.id_usuario" placeholder="Id Usuario">
                </div>

                <button form="formEditar" class="btn btn-primary">Atualizar</button>
            </formulario>
        </painel>
    </modal>
    <modal nome="detalhe">
        <painel titulo="detalhe">
            <p>@{{ $store.state.item.ds_livro }}</p>
        </painel>
    </modal>
@endsection