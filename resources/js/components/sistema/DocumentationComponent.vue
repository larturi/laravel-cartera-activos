<template>

    <tr>
        <td class="text-nowrap">{{ documentation.documentation.nombre }}</td>
        <td class="text-nowrap">{{ documentation.url_document }}</td>
        <td class="text-nowrap">{{ documentation.comentarios }}</td>
        <td v-if="canedit">
            <a href="#" class="btn btn-outline-success btn-sm my-1 float-right" v-on:click.prevent="onClickOpenUrl()">Abrir</a>
            <a href="#" class="btn btn-outline-danger btn-sm mr-2 my-1 float-right" v-on:click.prevent="onClickDelete()">Borrar</a>
        </td>

    </tr>

</template>

<script>
    export default {

        props: {
            documentation: {},
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
                        axios.delete(`/api/documentations-sistema/${this.documentation.id}`).then( () => {
                            this.$emit('delete');
                        });
                    }
                });
            },

            onClickOpenUrl() {
                window.open(this.documentation.url_document);
            },
        },

    }
</script>



