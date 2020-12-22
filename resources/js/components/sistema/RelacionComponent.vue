<template>

        <tr>
            <td>{{ relacion.sistema.nombre }}</td>
            <td>{{ relacion.descripcion }}</td>
            <td v-if="canedit">
                <a href="#"
                class="btn btn-outline-danger btn-sm"
                v-on:click="onClickDelete()">Borrar</a>
            </td>

        </tr>

</template>

<script>
    export default {

        props: {
            relacion: {},
            canedit: false
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
                            this.$swal.fire(
                                'Eliminado!',
                                'El registro ha sido eliminado',
                                'success'
                            );
                        });
                    }
                });
            },
        },

    }
</script>



