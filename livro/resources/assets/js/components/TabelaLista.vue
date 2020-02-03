<template>
    <div>

        <!--Este link não tem ação-->
        <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
        <modal-link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Criar" css=""></modal-link>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th v-for="titulo in titulos">{{titulo}}</th>

                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in itens">
                <td v-for="i in item">{{i}}</td>

                <td v-if="detalhe || editar || deletar">
                    <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                        <input type="hidden" name="_method" value="Delete">
                        <input type="hidden" name="_token" v-bind:value="token">

                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                        <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                        <modal-link v-if="editar && modal" tipo="link" nome="editar" titulo="Editar |" css=""></modal-link>

                        <a href="#" v-on:click="executaForm(index)">Deletar</a>

                    </form>
                    <!--<span>
                        <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                        <a v-if="editar" v-bind:href="editar">Editar |</a>
                        <a v-if="deletar" v-bind:href="deletar"> Deletar</a>
                    </span>-->
                </td>
            </tr>
            </tbody>
        </table>



    </div>
</template>
<script>
    export default {
        props:['titulos','itens','criar','detalhe','editar','deletar','token','modal'],
        methods:{
            executaForm: function(index){
                document.getElementById(index).submit();
            }
        }
    }
</script>