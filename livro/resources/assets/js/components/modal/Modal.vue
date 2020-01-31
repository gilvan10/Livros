<template>

    <div v-bind:id="nome" class="modal fade" tabindex="-1" role="dialog" v-bind:aria-labelledby="nome" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <slot></slot>
            </div>
        </div>
    </div>
    <!--<div v-bind:id="nome" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <p class="image is-4by3">
                <img src="https://bulma.io/images/placeholders/1280x960.png" alt="">
            </p>
        </div>

    </div>-->
</template>

<script>
    export default {
        props:['nome']
    }
</script>