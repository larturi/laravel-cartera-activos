<template>
    <div>

        <div v-if="loading">
            <loading-component/>
        </div>

        <div class="card-body p-0 table-responsive mb-0" style="display: block;" v-if="!loading && repositorios.length > 0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                    <th scope="col">Herramienta</th>
                    <th scope="col">Url</th>
                    <th scope="col">Comentarios</th>
                    <th v-if="canedit" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <repositorio-component
                            v-for="(repositorio) in repositorios"
                            :key="repositorio.id"
                            :canedit="canedit"
                            @delete="deleteRepositorio(repositorio)"
                            :repositorio="repositorio">
                    </repositorio-component>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row mb-0">

                <div class="col-8 mr-4">
                    <p class="mt-1"
                        style="margin-left: 19px;"
                        v-if="!loading && repositorios.length === 0">No se han cargado repositorios</p>
                </div>

                <div v-if="canedit" class="col">
                    <repositorio-add-component
                        @new="addRepositorio"
                        :sistema="sistemaid"
                    >
                    </repositorio-add-component>
                </div>

            </div>
        </div>


    </div>
</template>

<script>
    export default {

        props: ['sistemaid', 'canedit'],

        data() {
            return {
                repositorios: [],
                loading: false
            }
        },

        mounted() {
            this.loading = true;
            axios.get(`/api/repositorios-sistema/${this.sistemaid}`).then( response => {
                this.repositorios = response.data;
                this.loading = false;
            });
        },

        methods: {

            addRepositorio(repositorio) {
                this.repositorios.push(...repositorio);
            },
            deleteRepositorio(repositorio) {
                this.repositorios.splice(repositorio, 1);
            },

        },


    }
</script>



