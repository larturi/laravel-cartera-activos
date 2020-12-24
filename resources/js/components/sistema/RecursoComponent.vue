<template>

    <tr>
        <td>{{ recurso.user.name + ' ' + recurso.user.apellido }}</td>
        <td>{{ recurso.user.email }}</td>
        <td>
            <span class="badge"
                  :class="badgeColorRole(recurso.role.id)"
            >
                {{ recurso.role.nombre }}
            </span>
        </td>
        <td v-if="canedit">
            <a href="#"
               v-if="recurso.role_id !== 1"
               class="btn btn-outline-danger btn-sm"
               v-on:click.prevent="onClickDelete()">Borrar</a>
        </td>

    </tr>

</template>

<script>
    export default {

        props: {
            recurso: {},
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
                        axios.delete(`/api/recursos/${this.recurso.id}`).then( () => {
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

            badgeColorRole(role) {

                switch (role) {
                    case 1:
                        return 'badge-dark'
                        break;

                    case 2:
                        return 'badge-primary'
                        break;

                    case 3:
                        return 'badge-primary'
                        break;

                    case 4:
                        return 'badge-success'
                        break;

                    case 5:
                        return 'badge-success'
                        break;

                    case 6:
                        return 'badge-info'
                        break;

                    default:
                        return 'badge-warning'
                        break;
                }

            },
        },

    }
</script>



