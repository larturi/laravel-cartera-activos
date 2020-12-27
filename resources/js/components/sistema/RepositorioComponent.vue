<template>

    <tr>
        <td>{{ repositorio.repositorio.nombre }}</td>
        <td>{{ repositorio.url_repositorio }}</td>
        <td>{{ repositorio.comentarios }}</td>
        <td v-if="canedit">
            <a href="#" class="btn btn-outline-danger btn-sm my-1 float-right" v-on:click.prevent="onClickDelete()">Borrar</a>
            <a href="#" class="btn btn-outline-primary btn-sm mr-2 my-1 float-right" v-on:click.prevent="onClickEdit()">Editar</a>
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
                        });
                    }
                });
            },

            onClickEdit() {
                axios.get(`/api/repositorio-sistema/${this.repositorio.id}`).then(  response => {
                    this.$emit("update-repositorio-selected", response.data) ;
                    $('#modelRepositorioId').modal('toggle');
                });
            }

        },

    }
</script>



