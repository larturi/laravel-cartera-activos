<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mr-2 mt-1 btn-sm float-right" data-toggle="modal" data-target="#modelRepositorioId">
          Agregar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelRepositorioId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div v-if="!isEditing">

                        <form action="" @submit.prevent="addRepositorioToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Agregar Repositorio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>

                            <div class="modal-body">

                                <b-form-select v-model="selectedRepositorio"
                                            :options="repositorios"
                                            :class="this.nullRepositorioError ? 'is-invalid' : ''"
                                            class="mb-3">
                                </b-form-select>

                                <input type="text"
                                    class="form-control"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="url"
                                    placeholder="Ingresar la URL del repositorio del proyecto"
                                    v-model="url">

                                <input type="text"
                                    class="form-control mt-3"
                                    name="comentarios"
                                    placeholder="Ingresar comentarios"
                                    v-model="comentarios">

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

                        <form action="" @submit.prevent="addRepositorioToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Editar Repositorio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>

                            <div class="modal-body">

                                <b-form-select v-model="repositorioEdit.repositorio_id"
                                            :options="repositorios"
                                            disabled
                                            class="mb-3">
                                </b-form-select>

                                <input type="text"
                                    class="form-control"
                                    :class="this.urlError ? 'is-invalid' : ''"
                                    name="url"
                                    placeholder="Ingresar la URL del repositorio del proyecto"
                                    v-model="repositorioEdit.url_repositorio">

                                <input type="text"
                                    class="form-control mt-3"
                                    name="comentarios"
                                    placeholder="Ingresar comentarios"
                                    v-model="repositorioEdit.comentarios">

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
            repositorio: {},
            repositorioEdit: {},
            isEditing: false,
        },

       data() {
            return {
                selectedRepositorio: null,
                url: '',
                comentarios: '',
                urlError: false,
                nullRepositorioError: false,
                repositorios: [],
            }
        },

        mounted() {
            axios.get(`/api/repositorios/habilitados`).then( response => {

                let repositoriosSelect = [{ value: null, text: '-- Seleccionar Repositorio --' }];

                response.data.forEach( repositorio => {
                    repositoriosSelect.push({ value: repositorio.id, text: repositorio.nombre })
                });

                this.repositorios = repositoriosSelect;
            });
        },

        methods: {
            validURL,

            addRepositorioToProject() {

                this.urlError = false;

                if (!this.isEditing) {

                    // Validaciones
                    if(this.selectedRepositorio === null) {
                        this.nullRepositorioError = true;
                    }

                    if(!validURL(this.url)) {
                        this.urlError = true;
                    }

                    if(this.urlError || this.nullRepositorioError) {
                        return;
                    }

                    // Create
                    const params = {
                        sistema_id: this.sistema,
                        repositorio_id: this.selectedRepositorio,
                        url_repositorio: this.url,
                        comentarios: this.comentarios,
                    };

                    axios.post(`/api/repositorios-sistema`, params)
                    .then( response => {
                            const repositorio = response.data;
                            this.$emit('new', repositorio);
                            $('#modelRepositorioId').modal('hide');
                            this.url = '';
                            this.comentarios = '';
                            this.selectedRepositorio = null;
                    });

                } else {

                    // Validaciones

                    if(!validURL(this.repositorioEdit.url_repositorio)) {
                        this.urlError = true;
                    }

                    if(this.urlError) {
                        return;
                    }

                    // Update
                    const params = {
                        repositorio_id: this.repositorioEdit.id,
                        url_repositorio: this.repositorioEdit.url_repositorio,
                        comentarios: this.repositorioEdit.comentarios,
                    };

                    axios.put(`/api/repositorio-sistema`, params)
                    .then( response => {
                            const repositorio = response.data;
                            this.$emit('new', repositorio);
                            $('#modelRepositorioId').modal('hide');
                            this.repositorioEdit.url = '';
                            this.repositorioEdit.comentarios = '';
                    });

                }

                this.urlError = false;
                this.nullRepositorioError = false;

            },

            cerrarPopUp() {
                this.$emit('update-is-editing', false);
            },

        },
    }
</script>



