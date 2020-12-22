
<template>
    <div>
        <div class="card-body p-0 table-responsive" style="display: block;">

            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <usuario-component
                        v-for="(usuario, index) in this.users"
                        :key="usuario.id"
                        @update="update(index, ...arguments)"
                        :usuario="usuario">
                    </usuario-component>
                </tbody>

            </table>

        </div>
    </div>
</template>



<script>
    export default {

        props: {
            usuarios: {},
        },

        data() {
            return {
                users: {},
            }
        },

        methods: {
            update(index, usuario) {
                const updatedUser = usuario;
                const indexOfItemInArray = this.users.findIndex(q => q.id === updatedUser.id);
                this.users.splice(indexOfItemInArray, 1, updatedUser);
            }
        },

        mounted() {
            this.users = this.usuarios.data;
        }

    }
</script>
















