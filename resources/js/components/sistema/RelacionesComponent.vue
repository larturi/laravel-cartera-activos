<template>

    <div>

        <div class="card-body p-0 table-responsive mb-0" style="display: block;" v-if="relaciones.length > 0">
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
                            :relacion="relacion">
                    </relacion-component>

                </tbody>

            </table>
        </div>

        <div class="card-footer">
            <div class="row mb-0">

                <div class="col-8 mr-4">
                    <p class="mt-1"
                    style="margin-left: 19px;"
                    v-if="relaciones.length === 0">No se han encontrado relaciones con otros sistemas</p>
                </div>

                <div v-if="canedit" class="col mr-1">
                    <relacion-add-component
                        @new="addRelacion"
                        :sistema="sistema.id"
                        :relaciones="relaciones"
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
            }
        },

        mounted() {
            axios.get(`/api/relaciones/${this.sistema.id}`).then( response => {
                this.relaciones = response.data;
            });
        },

        methods: {
            addRelacion(relacion) {
                this.relaciones.push(...relacion);
            },
            deleteRelacion(relacion) {
                this.relaciones.splice(relacion, 1);
            },
        },

    }
</script>



