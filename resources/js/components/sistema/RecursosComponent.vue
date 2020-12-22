<template>

    <div>

        <div class="row">

            <div class="col">

                <div class="card card-primary">

                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h6 class="card-title">Listado de Referentes</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0 table-responsive mb-0" style="display: block;">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                <th scope="col">Recurso</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th v-if="canedit" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <recurso-component
                                        v-for="(recurso) in recursos"
                                        :key="recurso.id"
                                        :canedit="canedit"
                                        @delete="deleteRecurso(recurso)"
                                        :recurso="recurso">
                                </recurso-component>

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div v-if="canedit" class="col">
                                <recurso-add-component
                                    @new="addRecurso"
                                    :sistema="sistema.id"
                                    :recursos="recursos"
                                >
                                </recurso-add-component>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>
    export default {
        props: ['sistema', 'lider', 'canedit'],

        data() {
            return {
                recursos: [],
            }
        },

        mounted() {
            axios.get(`/api/recursos/${this.sistema.id}`).then( response => {
                this.recursos = response.data;
            });
        },

        methods: {
            addRecurso(recurso) {
                this.recursos.push(...recurso);
            },
            deleteRecurso(recurso) {
                this.recursos.splice(recurso, 1);
            },
        },

    }
</script>



