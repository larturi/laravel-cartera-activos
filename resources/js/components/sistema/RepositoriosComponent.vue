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
                        <th v-if="canedit"></th>
                    </tr>
                </thead>
                <tbody>

                    <repositorio-component
                            v-for="(repositorio) in repositorios"
                            :key="repositorio.id"
                            :canedit="canedit"
                            @delete="deleteRepositorio(repositorio)"
                            @update-repositorio-selected="onUpdateItemSelected(repositorio)"
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
                        @update="updateRepositorio(...arguments)"
                        :sistema="sistemaid"
                        :repositorioEdit="repositorioEdit"
                        :isEditing="isEditing"
                        @update-is-editing="onUpdateIsEditing(state = false)"
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
                loading: false,
                repositorioEdit: {},
                isEditing: false
            }
        },

        mounted() {
            this.refresh();
        },

        methods: {

            addRepositorio(repositorio) {
                this.refresh();
            },
            deleteRepositorio(repositorio) {
                this.refresh();
            },
            updateRepositorio(repositorio) {
                this.refresh();
            },
            onUpdateIsEditing(state) {
                this.isEditing = state;
            },
            onUpdateItemSelected(repositorio) {
                this.repositorioEdit = {...repositorio};
                this.isEditing = true;
            },
            refresh() {
                this.loading = true;
                axios.get(`/api/repositorios-sistema/${this.sistemaid}`).then( response => {
                    this.repositorios = response.data;
                    this.loading = false;
                    this.isEditing = false;
                });
            }

        },


    }
</script>



