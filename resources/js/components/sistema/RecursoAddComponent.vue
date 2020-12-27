<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-2 mb-1 mr-1 btn-sm float-right" data-toggle="modal" data-target="#modelId">
          Agregar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <form action="" @submit.prevent="addRecursoToProject()">

                        <div class="modal-header">
                                <h5 class="modal-title text-dark">Agregar Recurso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>

                        <div class="modal-body">

                            <b-form-select v-model="selectedMiembro"
                                           :options="miembros"
                                           class="mb-3">
                            </b-form-select>

                            <b-form-select v-model="selectedRole" :options="roles"></b-form-select>

                            <div class="row mt-4" v-if="hasErrorUnique">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Error: El recurso ya se encuentra asignado al proyecto.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
                                        v-on:click="cerrarPopUp"
                                        data-dismiss="modal">
                                        Cerrar
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {

       props: ['sistema', 'recursos'],

       data() {
            return {
                selectedMiembro: null,
                selectedRole: null,
                miembros: [],
                roles: [],
                hasErrorUnique: false
            }
        },

        mounted() {
            axios.get(`/api/miembros`).then( response => {

                let miembrosSelect = [{ value: null, text: '-- Seleccionar Miembro --' }];

                response.data.forEach( miembro => {
                    miembrosSelect.push({ value: miembro.id, text: miembro.apellido + ', ' + miembro.name })
                });

                this.miembros = miembrosSelect;
            });

            axios.get(`/api/roles`).then( response => {
                let rolesSelect = [{ value: null, text: '-- Seleccionar Rol --' }];

                response.data.forEach( role => {
                    rolesSelect.push({ value: role.id, text: role.nombre })
                });

                this.roles = rolesSelect;
            });
        },

        methods: {
            addRecursoToProject() {

                if(this.selectedMiembro === null || this.selectedRole === null) {
                    return;
                }

                const params = {
                    sistema_id: this.sistema,
                    user_id: this.selectedMiembro,
                    role_id: this.selectedRole,
                };

                axios.post(`/api/recursos`, params)
                   .then( response => {
                       if(response.data === 'UNIQUE_ERROR') {
                           this.hasErrorUnique = true;
                       } else {
                            const recurso = response.data;
                            this.hasErrorUnique = false;
                            this.$emit('new', recurso);
                       }
                   });

            },

            cerrarPopUp() {
                this.hasErrorUnique = false;
            }
        },
    }
</script>



