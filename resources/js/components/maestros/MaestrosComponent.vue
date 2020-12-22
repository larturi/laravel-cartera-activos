<template>
    <div class="row">
        <div class="col-lg-8">

            <div class="card card-primary">

                <div class="card-header">
                   <h3 class="card-title text-center">{{ capitalizeFirstLetter(pluralname) }}</h3>
                </div>

                <div class="card-body p-0 table-responsive" style="display: block;">

                    <div class="row mt-4 mx-4">
                        <div class="col">
                            <p class="text-muted">{{ description }}</p>
                        </div>
                    </div>


                    <div class="row mx-4">
                        <div class="col">
                            <maestro-alta-component
                                @new="addMaestro"
                                :name="name"
                                :pluralname="pluralname"
                                :description="description">
                            </maestro-alta-component>

                            <maestro-component
                                    v-for="(maestro, index) in maestros"
                                    :key="maestro.id"
                                    :readonly="readonly"
                                    :maestro="maestro"
                                    :pluralname="pluralname"
                                    @update="updateMaestro(index, ...arguments)"
                                    @delete="deleteMaestro(index)">
                            </maestro-component>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</template>

<script>
import {capitalizeFirstLetter} from '../../helpers';

    export default {
        props: ['name', 'pluralname', 'description', 'readonly'],
        data() {
            return {
                maestros: [],
            }
        },
        mounted() {
            axios.get(`/api/${this.pluralname}`).then( response => {
                this.maestros = response.data;
            });
        },
        methods: {
            capitalizeFirstLetter,
            addMaestro(maestro) {
                this.maestros.push(maestro);
            },
            deleteMaestro(index) {
                this.maestros.splice(index, 1);
            },
            updateMaestro(index, maestro) {
                this.maestros[index] = maestro;
            }
        },
    }
</script>
