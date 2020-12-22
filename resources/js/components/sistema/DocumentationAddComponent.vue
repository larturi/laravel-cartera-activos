<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mr-2 mt-1 btn-sm float-right" data-toggle="modal" data-target="#modelDocumentationId">
          Agregar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelDocumentationId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <form action="" @submit.prevent="addDocumentationToProject()">

                        <div class="modal-header">
                                <h5 class="modal-title text-dark">Agregar Documentación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>

                        <div class="modal-body">

                            <b-form-select v-model="selectedDocumentation"
                                           :options="documentations"
                                           :class="this.nullDocumentationError ? 'is-invalid' : ''"
                                           class="mb-3">
                            </b-form-select>

                            <input type="text"
                                   class="form-control"
                                   :class="this.urlError ? 'is-invalid' : ''"
                                   name="url"
                                   placeholder="Ingresar link a la documentación"
                                   v-model="url">

                            <input type="text"
                                   class="form-control mt-3"
                                   name="comentarios"
                                   maxlength="50"
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

            </div>
        </div>
    </div>
</template>

<script>
import {validURL} from '../../helpers';

    export default {

       props: ['sistema'],

       data() {
            return {
                selectedDocumentation: null,
                url: '',
                comentarios: '',
                urlError: false,
                nullDocumentationError: false,
                documentations: [],
            }
        },

        mounted() {
            axios.get(`/api/documentations`).then( response => {

                let documentationsSelect = [{ value: null, text: '-- Seleccionar Documentación --' }];

                response.data.forEach( documentation => {
                    documentationsSelect.push({ value: documentation.id, text: documentation.nombre })
                });

                this.documentations = documentationsSelect;
            });
        },

        methods: {
            validURL,

            addDocumentationToProject() {

                this.urlError = false;
                this.nullDocumentationError = false;

                // Validaciones
                if(this.selectedDocumentation === null) {
                    this.nullDocumentationError = true;
                }

                if(!validURL(this.url)) {
                    this.urlError = true;
                }

                if(this.urlError || this.nullDocumentationError) {
                    return;
                }

                // Post
                const params = {
                    sistema: this.sistema,
                    documentation_id: this.selectedDocumentation,
                    url_document: this.url,
                    comentarios: this.comentarios,
                };

                axios.post(`/api/documentations-sistema`, params)
                   .then( response => {
                        const documentation = response.data;
                        this.$emit('new', documentation);
                        $('#modelDocumentationId').modal('hide');
                        this.url = '';
                        this.comentarios = '';
                        this.selectedDocumentation = null;
                   });

            },

            cerrarPopUp() {

            },
        },
    }
</script>



