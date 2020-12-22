<template>

    <tr>
        <td>{{ repositorio.repositorio.nombre }}</td>
        <td>{{ repositorio.url_repositorio }}</td>
        <td>{{ repositorio.comentarios }}</td>
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
            repositorio: {},
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
                        axios.delete(`/api/repositorios-sistema/${this.repositorio.id}`).then( () => {
                            this.$emit('delete');
                            this.$swal.fire(
                                'Eliminado!',
                                'El repositorio ha sido eliminado',
                                'success'
                            );
                        });
                    }
                });
            },
        },

    }
</script>



