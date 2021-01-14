
<template>

    <div>
        <div class="card-body p-0 table-responsive" style="display: block;">

            <table v-if="this.users.length > 0" class="table table-striped projects">
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

            <div v-if="this.users.length === 0" class="card-body text-center mt-2" style="display: block;">
                No se han encontrado usuarios
            </div>

            <!-- Paginador -->
            <div v-if="this.users.length > 0" class="row">
                <div class="col mt-4 ml-3">
                    <nav class="" aria-label="">
                        <ul class="pagination">
                            <li class="page-item"
                                :class="{'disabled' : pagina_actual === 1}">
                                <a v-on:click.prevent="goToPage(pagina_actual - 1)" class="page-link" href="#">Anterior</a>
                            </li>

                            <li class="page-item"
                                :class="{'active' : pagina_actual === index}"
                                v-for="index in last_page" :key="index"
                            >
                                <a v-on:click.prevent="goToPage(index)" class="page-link" href="#">{{ index }}</a>
                            </li>

                            <li class="page-item"
                                :class="{'disabled' : pagina_actual === last_page}"
                            >
                                <a v-on:click.prevent="goToPage(pagina_actual + 1)" class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

</template>

<script>

import store from '../store/usuarios';

    export default {

        store,

        data() {
            return {

            }
        },

        methods: {
            getUsers(page = 1) {
                axios.get(`/api/usuarios/all_users?page=${page}`).then( (response) => {
                    this.$store.commit('setUsuarios', response.data.data);
                    this.$store.commit('setTotalUsuarios', response.data.total);
                    this.$store.commit('setPerPage', response.data.per_page);
                    this.$store.commit('setLastPage', response.data.last_page);
                    this.$store.commit('setPaginaActual', page);
                });
            },
            update(index, usuario) {
                const updatedUser = usuario;
                const indexOfItemInArray = this.users.findIndex(q => q.id === updatedUser.id);
                this.users.splice(indexOfItemInArray, 1, updatedUser);
            },
            goToPage(page) {
                this.getUsers(page);
                this.$store.commit('setPaginaActual', page);
            },

        },

        mounted() {
            this.getUsers();
        },

        computed: {
            users() {
                return this.$store.state.users;
            },
            pagina_actual() {
                return this.$store.state.pagina_actual;
            },
            last_page() {
                return this.$store.state.last_page;
            },
        }

    }

</script>
















