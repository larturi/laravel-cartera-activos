<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" @submit.prevent="newMaestro()">

                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           v-model="maestro"
                           :name="name"
                           :placeholder="`Agregar ${placeholder}`">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>

            </form>
        </div>

        <div class="row" v-if="error">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    El valor ingresado ya existe en la base de datos.
                </div>
            </div>
        </div>

    </div>
</template>


<script>
import {capitalizeFirstLetter} from '../../helpers';

    export default {
        props: ['name', 'pluralname', 'placeholder'],
        data() {
            return {
                maestro: '',
                error: false
            }
        },
        methods: {
            capitalizeFirstLetter,
            newMaestro() {
                const params = {
                    nombre: this.maestro
                };

                this.maestro = '';

                axios.post(`/api/${this.pluralname}`, params)
                   .then( response => {
                       const maestro = response.data;
                       if(response.data.error) {
                           this.error = true;
                       } else {
                          this.$emit('new', maestro);
                          this.error = false;
                       }
                   });

            },

        },
    }
</script>
