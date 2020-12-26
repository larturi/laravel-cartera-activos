<template>
    <div class="row">
        <div class="col-lg-8">

            <div class="card card-primary">

                <div class="card-header">
                   <h3 class="card-title text-center">{{ capitalizeFirstLetter(titulo) }}</h3>
                </div>

                <div class="card-body p-0 table-responsive" style="display: block;">

                    <div class="row mt-4 mx-4">
                        <div class="col">
                            <p class="text-muted">{{ description }}.</p>
                        </div>
                    </div>

                    <div v-if="loading">
                        <loading-component/>
                    </div>

                    <div v-if="!loading" class="row mx-4">
                        <div class="col">
                            <maestro-alta-component
                                @new="addMaestro"
                                :name="name"
                                :pluralname="pluralname"
                                :placeholder="placeholder"
                                :description="description">
                            </maestro-alta-component>

                            <maestro-component
                                    v-for="(maestro, index) in maestros"
                                    :key="maestro.id"
                                    :readonly="readonly"
                                    :maestro="maestro"
                                    :pluralname="pluralname"
                                    @update="updateMaestro(index, ...arguments)">
                            </maestro-component>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 mx-4">
                    <div class="col">
                        <p class="text-muted"><span class="fas fa-info-circle mr-1"></span>Los elementos en estado deshabilitado no podran seleccionarse al dar de alta nuevos sistemas.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import {capitalizeFirstLetter} from '../../helpers';

    export default {
        props: ['name', 'pluralname', 'description', 'readonly', 'titulo', 'placeholder'],
        data() {
            return {
                maestros: [],
                loading: false
            }
        },
        mounted() {
            this.loading = true;
            axios.get(`/api/${this.pluralname}`).then( response => {
                this.maestros = response.data;
                this.loading = false;
            });
        },
        methods: {
            capitalizeFirstLetter,
            addMaestro(maestro) {
                this.maestros.push(maestro);
            },
            updateMaestro(index, maestro) {
                this.maestros[index] = maestro;
            }
        },
    }
</script>
