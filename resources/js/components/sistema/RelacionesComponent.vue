<template>

    <div>

        <div v-if="loading">
            <loading-component/>
        </div>

        <div v-if="!loading && relaciones.length > 0" class="card-body p-0 table-responsive mb-0" style="display: block;">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                    <th scope="col">Sistema</th>
                    <th scope="col">Descripción Relación</th>
                    <th v-if="canedit" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <relacion-component
                            v-for="(relacion) in relaciones"
                            :key="relacion.id"
                            :canedit="canedit"
                            @delete="deleteRelacion(relacion)"
                            @update-relacion-selected="onUpdateItemSelected(relacion)"
                            :relacion="relacion">
                    </relacion-component>

                </tbody>

            </table>
        </div>

        <div v-if="!loading" class="card-footer">
            <div class="row mb-0">

                <div class="col-8 mr-4">
                    <p class="mt-1"
                    style="margin-left: 19px;"
                    v-if="!loading && relaciones.length === 0">No se han encontrado relaciones con otros sistemas</p>
                </div>

                <div v-if="canedit" class="col mr-1">
                    <relacion-add-component
                        @new="addRelacion"
                        @update="updateRelacion(...arguments)"
                        :sistema="sistema.id"
                        :relaciones="relaciones"
                        :relacionEdit="relacionEdit"
                        :isEditing="isEditing"
                        @update-isEditing="onUpdateIsEditing(state = false)"
                    >
                    </relacion-add-component>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
    export default {
        props: ['sistema', 'canedit'],

        data() {
            return {
                relaciones: [],
                loading: false,
                relacionEdit: {},
                isEditing: false
            }
        },

        mounted() {
            this.refresh();
        },

        methods: {
            addRelacion(relacion) {
                this.refresh();
            },
            deleteRelacion(relacion) {
                this.refresh();
            },
            updateRelacion(relacion) {
                this.refresh();
            },
            onUpdateIsEditing(state) {
                this.isEditing = state;
            },
            onUpdateItemSelected(relacion) {
                this.relacionEdit = {...relacion};
                this.isEditing = true;
            },
            refresh() {
                this.loading = true;
                axios.get(`/api/relaciones/${this.sistema.id}`).then( response => {
                    this.relaciones = response.data;
                    this.loading = false;
                    this.isEditing = false;
                });
            }
        },

    }
</script>



