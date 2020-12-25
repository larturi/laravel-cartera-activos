<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mr-1 mt-1 btn-sm float-right" data-toggle="modal" data-target="#modelRelacionId">
          Agregar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelRelacionId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div v-if="!isEditing">

                        <form @submit.prevent="addRelacionToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Agregar Relación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12">
                                        <label for="descripcion">Sistema:</label>
                                        <b-form-select v-model="selectedSistema"
                                                    :options="sistemas"
                                                    class="mb-3">
                                        </b-form-select>
                                    </div>

                                    <div class="col-12">
                                        <label for="descripcion">Descripción de la relación:</label>
                                        <textarea
                                            class="form-control"
                                            name="descripcion"
                                            cols="30"
                                            rows="3"
                                            v-model="descripcion">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mt-4" v-if="hasErrorUnique">
                                    <div class="col">
                                        <div class="alert alert-danger" role="alert">
                                            Error: La relación que esta intentando cargar ya existe.
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

                    <div v-else>

                        <form @submit.prevent="addRelacionToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Editar Relación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12">
                                        <label for="descripcion">Sistema:</label>
                                        <b-form-select
                                                    v-model="relacionEdit.sistema.id"
                                                    :options="sistemas"
                                                    disabled
                                                    class="mb-3">
                                        </b-form-select>
                                    </div>

                                    <div class="col-12">
                                        <label for="descripcion">Descripción de la relación:</label>
                                        <textarea
                                            class="form-control"
                                            name="descripcion"
                                            cols="30"
                                            rows="3"
                                            v-model="relacionEdit.descripcion">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mt-4" v-if="hasErrorUnique">
                                    <div class="col">
                                        <div class="alert alert-danger" role="alert">
                                            Error: La relación que esta intentando cargar ya existe.
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
    </div>
</template>

<script>
    export default {

        props: {
            sistema: '',
            relacion: {},
            relacionEdit: {},
            isEditing: false,
        },

       data() {
            return {
                selectedSistema: null,
                descripcion: '',
                sistemas: [],
                hasErrorUnique: false
            }
        },

        mounted() {
            axios.get(`/api/sistemas`).then( response => {

                let sistemasSelect = [{ value: null, text: '-- Seleccionar Sistema --' }];

                response.data.forEach( sistema => {
                    if(this.sistema !== sistema.id) {
                        sistemasSelect.push({ value: sistema.id, text: sistema.nombre })
                    }
                });

                this.sistemas = sistemasSelect;
            });
        },

        methods: {
            addRelacionToProject() {

                if (!this.isEditing) {

                    if(this.selectedSistema === null || this.descripcion === '') {
                        return;
                    }

                    // Create
                    const params = {
                        sistema: this.sistema,
                        sistema_id: this.selectedSistema,
                        descripcion: this.descripcion
                    };

                    axios.post(`/api/relaciones`, params)
                    .then( response => {
                        if(response.data === 'UNIQUE_ERROR') {
                            this.hasErrorUnique = true;
                        } else {
                            const sistema = response.data;
                            this.$emit('new', sistema);
                            $('#modelRelacionId').modal('hide');
                            this.selectedSistema = '';
                            this.descripcion = '';
                        }
                    });

                } else {

                    // Update
                    const params = {
                        relacion_id: this.relacionEdit.id,
                        descripcion: this.relacionEdit.descripcion
                    };

                    axios.put(`/api/relacion-sistema`, params)
                    .then( response => {
                        const sistema = response.data;
                        this.$emit('update', sistema);
                        $('#modelRelacionId').modal('hide');
                        this.relacionEdit.titulo = '';
                        this.relacionEdit.descripcion = '';
                    });

                }

            },

            cerrarPopUp() {
                this.hasErrorUnique = false;
                this.$emit('update-is-editing', false);
            }
        },
    }
</script>



