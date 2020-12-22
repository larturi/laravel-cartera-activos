<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mr-2 mt-1 btn-sm float-right" data-toggle="modal" data-target="#modelHitoId" v-on:click="limpiarForm">
          Agregar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelHitoId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div v-if="!isEditing">

                        <form action="" @submit.prevent="addHitoToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Agregar Hito</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>

                            <div class="modal-body">

                                <div class="col">
                                    <label for="fecha">Fecha:</label>
                                    <input id="fecha"
                                            type="date"
                                            :class="this.nullFechaError ? 'is-invalid' : ''"
                                            class="form-control mb-3"
                                            v-model="fecha"
                                            name="fecha"
                                            autocomplete="fecha" autofocus>
                                </div>

                                <div class="col">
                                    <label for="fecha">Titulo:</label>
                                    <input type="text"
                                    :class="this.nullTituloError ? 'is-invalid' : ''"
                                    class="form-control mb-3"
                                    name="titulo"
                                    maxlength="50"
                                    placeholder="Titulo del hito"
                                    v-model="titulo">
                                </div>

                                <div class="col">
                                    <label for="fecha">Descripción:</label>
                                    <textarea name="descripcion"
                                            cols="30"
                                            :class="this.nullDescripcionError ? 'is-invalid' : ''"
                                            class="form-control mb-3"
                                            v-model="descripcion"
                                            rows="3">
                                    </textarea>
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

                        <form action="" @submit.prevent="addHitoToProject()">

                            <div class="modal-header">
                                    <h5 class="modal-title text-dark">Editar Hito</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="cerrarPopUp">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>

                            <div class="modal-body">

                                <div class="col">
                                    <label for="fecha">Fecha:</label>
                                    <input id="fecha"
                                            type="date"
                                            :class="this.nullFechaError ? 'is-invalid' : ''"
                                            class="form-control mb-3"
                                            v-model="hitoEdit.fecha"
                                            name="fecha"
                                            autocomplete="fecha" autofocus>
                                </div>

                                <div class="col">
                                    <label for="fecha">Titulo:</label>
                                    <input type="text"
                                    :class="this.nullTituloError ? 'is-invalid' : ''"
                                    class="form-control mb-3"
                                    name="titulo"
                                    maxlength="50"
                                    placeholder="Titulo del hito"
                                    v-model="hitoEdit.titulo">
                                </div>

                                <div class="col">
                                    <label for="fecha">Descripción:</label>
                                    <textarea name="descripcion"
                                            cols="30"
                                            :class="this.nullDescripcionError ? 'is-invalid' : ''"
                                            class="form-control mb-3"
                                            v-model="hitoEdit.descripcion"
                                            rows="3">
                                    </textarea>
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
            hito: {},
            hitoEdit: {},
            isEditing: false,
        },

       data() {
            return {
                titulo: '',
                descripcion: '',
                fecha : new Date().toISOString().slice(0,10),
                nullTituloError: false,
                nullFechaError: false,
                nullDescripcionError: false,
            }
        },


        methods: {

            addHitoToProject() {

                this.nullTituloError = false;
                this.nullFechaError = false;
                this.nullDescripcionError = false;

                if (!this.isEditing) {

                    // Validaciones

                    if(this.titulo === '') {
                        this.nullTituloError = true;
                    }

                    if(this.fecha === '') {
                        this.nullFechaError = true;
                    }

                    if(this.descripcion === '') {
                        this.nullDescripcionError = true;
                    }

                    if(this.nullTituloError || this.nullFechaError || this.nullDescripcionError) {
                        return;
                    }

                    // Create
                    const params = {
                        sistema: this.sistema,
                        titulo: this.titulo,
                        descripcion: this.descripcion,
                        fecha: this.fecha,
                    };

                    axios.post(`/api/hitos-sistema`, params)
                    .then( response => {
                            const hito = response.data;
                            this.$emit('new', hito);

                            $('#modelHitoId').modal('hide');
                            this.titulo = '';
                            this.descripcion = '';
                            this.fecha = new Date().toISOString().slice(0,10);
                    });

                } else {

                    // Validaciones

                    if(this.hitoEdit.titulo === '') {
                        this.nullTituloError = true;
                    }

                    if(this.hitoEdit.fecha === '') {
                        this.nullFechaError = true;
                    }

                    if(this.hitoEdit.descripcion === '') {
                        this.nullDescripcionError = true;
                    }

                    if(this.nullTituloError || this.nullFechaError || this.nullDescripcionError) {
                        return;
                    }

                    // Update
                    const params = {
                        id: this.hitoEdit.id,
                        sistema: this.sistema,
                        titulo: this.hitoEdit.titulo,
                        descripcion: this.hitoEdit.descripcion,
                        fecha: this.hitoEdit.fecha,
                    };

                    axios.put(`/api/hito-sistema`, params)
                    .then( response => {
                        const hito = response.data;
                        this.$emit('update', hito);

                        $('#modelHitoId').modal('hide');
                        this.hitoEdit.titulo = '';
                        this.hitoEdit.descripcion = '';
                        this.hitoEdit.fecha = new Date().toISOString().slice(0,10);
                    });
                }

            },

            cerrarPopUp() {

            },

            limpiarForm() {
                this.hitoEdit.fecha = new Date().toISOString().slice(0,10);
                this.hitoEdit.titulo = '';
                this.hitoEdit.descripcion = '';
                this.$emit("update-isEditing", false) ;
            },
        },
    }


</script>



