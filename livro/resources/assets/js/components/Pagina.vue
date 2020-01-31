<template>
    <div class="container">
        <div class="row"></div>
           <div v-bind:class="defineTamanho">
            <slot></slot>
          </div>
    </div>
</template>

<script>
    export default {
        props:['tamanho'],
        computed:{
            defineTamanho: function() {
                if (this.tamanho >= 12) {
                    return "col-md-12";
                }
                return "col-md-4 col-md-offset-4"
            }
        }

    }
</script>