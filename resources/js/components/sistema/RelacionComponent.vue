<template>

        <tr>
            <td class="text-nowrap">{{ relacion.sistema.nombre }}</td>

            <td class="text-nowrap">
                {{ relacion.descripcion }}
            </td>

            <td v-if="canedit">
                <a href="#" class="btn btn-outline-danger btn-sm my-1 float-right" v-on:click.prevent="onClickDelete()">Borrar</a>
                <a href="#" class="btn btn-outline-primary btn-sm mr-2 my-1 float-right" v-on:click.prevent="onClickEdit()">Editar</a>
            </td>

        </tr>

</template>

<script>
    export default {

        props: {
            relacion: {},
            canedit: false
        },

        data() {
            return {
                relacionEdit: {},
            }
        },

        methods: {
            onClickDelete() {

                this.$swal({
                    title: 'Confirmas la eliminación?',
                    text: "No podras revertir esta acción",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: `Eliminar`,
                    cancelButtonText: `Cancelar`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/relaciones/${this.relacion.id}`).then( () => {
                            this.$emit('delete');
                        });
                    }
                });
            },

            onClickEdit() {

                axios.get(`/api/relacion-sistema/${this.relacion.id}`).then(  response => {
                    this.$emit("update-relacion-selected", response.data) ;
                    $('#modelRelacionId').modal('toggle');
                });

            }
        },

    }
</script>



