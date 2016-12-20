<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component {{ tempo }} {{ teste }}</div>

                    <div class="panel-body">
                        Caio Cezar Dantas Viana 
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tempo: Date.now(),
                teste: "Vue.js"
            }

        },

        created() {
            console.log('created');

        },

        ready() {
            console.log('ready');
        }
    }
</script>
