<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mr-2 mt-1 btn-sm float-right" data-toggle="modal" data-target="#modelAmbienteId" v-on:click="limpiarForm">
          Agregar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelAmbienteId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div v-if="!isEditing">
                        <form action="" @submit.prevent="addAmbienteToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Agregar Ambiente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>

                            <div class="modal-body">

                                <label for="cliente" class="">
                                    Ambiente:
                                </label>
                                <b-form-select v-model="selectedAmbiente"
                                            name="ambiente"
                                            :options="ambientes"
                                            :class="this.nullAmbienteError ? 'is-invalid' : ''"
                                            class="mb-3">
                                </b-form-select>

                                <label for="url" class="">
                                    Url del sistema:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="url"
                                    placeholder="Ingresar url del sistema"
                                    v-model="url">

                                <label for="base" class="">
                                    Nombre de la BD:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="base"
                                    placeholder="Ingresar nombre exacto de la BD"
                                    v-model="base">

                                <label for="servidor" class="">
                                    Servidor:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="servidor"
                                    placeholder="Ingresar nombre exacto del servidor de BD"
                                    v-model="servidor">

                                <label for="usuario_bd" class="">
                                    Usuario BD:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="usuario_bd"
                                    placeholder="Ingresar nombre exacto del servidor de BD"
                                    v-model="usuario_bd">

                                <label for="info" class="">
                                    Mas información de la Base de Datos:
                                </label>
                                <textarea name="info"
                                        class="form-control mb-2"
                                        v-model="info"
                                        placeholder="Mas información, por ejemplo tnsname..."
                                        cols="30"
                                        rows="8">
                                </textarea>
                            </div>

                            <div class="row mx-2" v-if="hasErrorUnique">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Error: El ambiente ya se encuentra registrado.
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
                        <form action="" @submit.prevent="addAmbienteToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Editar Ambiente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>

                            <div class="modal-body">

                                <label for="ambiente">
                                    Ambiente:
                                </label>

                                <input type="text"
                                    class="form-control mb-3"
                                    disabled
                                    name="ambiente"
                                    :value="ambienteEdit.ambiente.nombre">

                                <label for="url" class="">
                                    Url del sistema:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="url"
                                    placeholder="Ingresar url del sistema"
                                    v-model="ambienteEdit.url">

                                <label for="base" class="">
                                    Nombre de la BD:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="base"
                                    placeholder="Ingresar nombre exacto de la BD"
                                    v-model="ambienteEdit.base">

                                <label for="servidor" class="">
                                    Servidor:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="servidor"
                                    placeholder="Ingresar nombre exacto del servidor de BD"
                                    v-model="ambienteEdit.servidor">

                                <label for="usuario_bd" class="">
                                    Usuario BD:
                                </label>
                                <input type="text"
                                    class="form-control mb-3"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="usuario_bd"
                                    placeholder="Ingresar nombre exacto del servidor de BD"
                                    v-model="ambienteEdit.usuario_bd">

                                <label for="info" class="">
                                    Mas información de la Base de Datos:
                                </label>
                                <textarea name="info"
                                        class="form-control mb-2"
                                        v-model="ambienteEdit.info"
                                        cols="30"
                                        rows="8">
                                </textarea>
                            </div>

                            <div class="row mx-2" v-if="hasErrorUnique">
                                <div class="col">
                                    <div class="alert alert-danger" role="alert">
                                        Error: El ambiente ya se encuentra registrado.
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
import {validURL} from '../../helpers';

    export default {

       props: {
            sistema: '',
            ambiente: {},
            ambienteEdit: {},
            isEditing: false,
        },

       data() {
            return {
                selectedAmbiente: null,
                url: '',
                info: '',
                base: '',
                servidor: '',
                usuario_bd: '',
                urlError: false,
                nullAmbienteError: false,
                hasErrorUnique: false,
                ambientes: [],
            }
        },

        mounted() {

            axios.get(`/api/ambientes/habilitados`).then( response => {

                let ambientesSelect = [{ value: null, text: '-- Seleccionar Ambiente --' }];

                response.data.forEach( ambiente => {
                    ambientesSelect.push({ value: ambiente.id, text: ambiente.nombre })
                });

                this.ambientes = ambientesSelect;
            });
        },

        methods: {
            validURL,

            addAmbienteToProject() {

                this.urlError = false;
                this.nullAmbienteError = false;


                if (!this.isEditing) {

                    // Validaciones
                    if(this.selectedAmbiente === null) {
                        this.nullAmbienteError = true;
                    }

                    if(!validURL(this.url)) {
                        this.urlError = true;
                    }

                    if(this.urlError || this.nullAmbienteError) {
                        return;
                    }

                    // Post
                    const params = {
                        sistema_id: this.sistema,
                        ambiente_id: this.selectedAmbiente,
                        url: this.url,
                        base: this.base,
                        servidor: this.servidor,
                        usuario_bd: this.usuario_bd,
                        info: this.info,
                    };

                    axios.post(`/api/ambientes-sistema`, params)
                    .then( response => {

                        if(response.data === 'UNIQUE_ERROR') {
                           this.hasErrorUnique = true;
                        } else {
                            const ambiente = response.data;
                            this.$emit('new', ambiente);
                            $('#modelAmbienteId').modal('hide');
                            this.url = '';
                            this.bd = '';
                            this.selectedAmbiente = null;
                        }

                    });
                } else {
                    // Validaciones

                    if(this.ambienteEdit.ambiente_id === '') {
                        this.nullAmbienteError = true;
                    }

                    if(!validURL(this.ambienteEdit.url)) {
                        this.urlError = true;
                    }

                    if(this.nullAmbienteError || this.urlError) {
                        return;
                    }

                    // Update
                    const params = {
                        id: this.ambienteEdit.id,
                        sistema_id: this.sistema,
                        ambiente_id: this.ambienteEdit.ambiente_id,
                        url: this.ambienteEdit.url,
                        base: this.ambienteEdit.base,
                        servidor: this.ambienteEdit.servidor,
                        usuario_bd: this.ambienteEdit.usuario_bd,
                        info: this.ambienteEdit.info,
                    };

                    axios.put(`/api/ambiente-sistema`, params)
                    .then( response => {
                        const ambiente = response.data;
                        this.$emit('update', ambiente);

                        $('#modelAmbienteId').modal('hide');
                        this.ambienteEdit.ambiente_id = '';
                        this.ambienteEdit.url = '';
                        this.ambienteEdit.credenciales_bd = '';
                    });
                }

            },

            cerrarPopUp() {
                this.hasErrorUnique = false;
            },

            limpiarForm() {
                this.ambienteEdit.ambiente_id = '';
                this.ambienteEdit.url = '';
                this.ambienteEdit.credenciales_bd = '';

                this.selectedAmbiente = '';
                this.url = '';
                this.bd = '';

                this.$emit("update-isEditing", false) ;
            },
        },
    }
</script>



