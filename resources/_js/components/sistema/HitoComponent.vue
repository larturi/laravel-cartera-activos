<template>

    <tr>
        <td class="text-nowrap">{{ hito.fecha }}</td>
        <td class="text-nowrap">{{ hito.titulo }}</td>
        <td class="text-nowrap">{{ hito.descripcion }}</td>
        <td v-if="canedit">
            <a href="#" class="btn btn-outline-primary btn-sm mr-2 my-1" v-on:click.prevent="onClickEdit()">Editar</a>
            <a href="#" class="btn btn-outline-danger btn-sm mr-2 my-1" v-on:click.prevent="onClickDelete()">Borrar</a>
        </td>

    </tr>

</template>

<script>
    export default {

        props: {
            hito: {},
            canedit: false
        },

        data() {
            return {
                hitoEdit: {},
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
                        axios.delete(`/api/hitos-sistema/${this.hito.id}`).then( () => {
                            this.$emit('delete');
                            this.$swal.fire(
                                'Eliminado!',
                                'El hito ha sido eliminado',
                                'success'
                            );
                        });
                    }
                });
            },

            onClickEdit() {

                axios.get(`/api/hito-sistema/${this.hito.id}`).then(  response => {
                    this.$emit("update-hito-selected", response.data) ;
                    $('#modelHitoId').modal('toggle');
                });

            }

        }

    }

</script>



