<template>

    <tr>
        <td class="text-nowrap">{{ ambiente.ambiente.nombre }}</td>
        <td class="text-nowrap">{{ ambiente.url }}</td>
        <td v-if="canedit">
            <a href="#" class="btn btn-outline-primary btn-sm mr-2 my-1" v-on:click.prevent="onClickEdit()">Editar</a>
            <a href="#" class="btn btn-outline-danger btn-sm mr-2 my-1" v-on:click.prevent="onClickDelete()">Borrar</a>
            <a href="#" class="btn btn-outline-success btn-sm mr-2 my-1" v-on:click.prevent="onClickOpenUrl()">Ir a URL</a>
        </td>

    </tr>

</template>

<script>
    export default {

        props: {
            ambiente: {},
            canedit: false
        },

        data() {
            return {
                ambienteEdit: {},
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
                        axios.delete(`/api/ambientes-sistema/${this.ambiente.id}`).then( () => {
                            this.$emit('delete');
                            this.$swal.fire(
                                'Eliminado!',
                                'ELiminación exitosa',
                                'success'
                            );
                        });
                    }
                });
            },

            onClickOpenUrl() {
                window.open(this.ambiente.url);
            },

            onClickEdit() {
                axios.get(`/api/ambiente-sistema/${this.ambiente.id}`).then(  response => {
                    console.log(response.data);
                    this.$emit("update-ambiente-selected", response.data) ;
                    $('#modelAmbienteId').modal('toggle');
                });
            }
        },

    }
</script>



