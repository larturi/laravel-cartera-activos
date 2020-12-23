<template>

    <div>

        <div class="row">

            <div class="col">

                <div class="card card-primary">

                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h6 class="card-title">Comentarios</h6>
                            </div>
                        </div>
                    </div>

                    <form action="" @submit.prevent="updateComentario()">

                        <div class="card-body">
                            <textarea
                                :id="columna"
                                :name="columna"
                                :disabled="!editMode"
                                cols="30"
                                rows="5"
                                v-model="comentario"
                                class="form-control">
                            </textarea>
                        </div>

                        <div class="card-footer" v-if="canedit">
                            <div class="row float-right">
                                <button v-if="editMode" type="submit" class="btn btn-success mt-2 mb-1 mr-1 btn-sm">
                                    Guardar
                                </button>

                                <button v-if="!editMode" v-on:click.prevent="onClickEdit()" type="button" class="btn btn-primary mt-2 mb-1 mr-1 btn-sm">
                                    Editar
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</template>

<script>
    export default {
        props: ['sistema', 'columna', 'canedit'],

        data() {
            return {
                comentario: '',
                editMode: false
            }
        },

        mounted() {
            switch (this.columna) {
                case 'comentarios_recursos':
                    this.comentario = this.sistema.comentarios_recursos
                break;

                case 'comentarios_desarrollo':
                    this.comentario = this.sistema.comentarios_desarrollo
                break;

                case 'comentarios_documentacion':
                    this.comentario = this.sistema.comentarios_documentacion
                break;

                case 'comentarios_ambientes':
                    this.comentario = this.sistema.comentarios_ambientes
                break;

                default:
                    break;
            }
        },

        methods: {

            onClickEdit () {
                this.editMode = true;
            },

            updateComentario() {
                const params = {
                    sistema_id: this.sistema.id,
                    columna: this.columna,
                    comentario: this.comentario,
                };

                axios.put(`/api/sistemas`, params)
                   .then( response => {
                       this.editMode = false;
                   });

            },
        },

    }
</script>



