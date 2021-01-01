
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

                    <div class="row">
                        <div class="col mt-4 ml-3">
                            <nav class="" aria-label="">
                                <ul class="pagination">
                                    <li class="page-item"
                                        :class="{'disabled' : paginaActual === 1}">
                                        <a v-on:click.prevent="goToPage(paginaActual - 1)" class="page-link" href="#">Anterior</a>
                                    </li>

                                    <li class="page-item"
                                        :class="{'active' : paginaActual === index}"
                                        v-for="index in this.lastPage" :key="index"
                                    >
                                        <a v-on:click.prevent="goToPage(index)" class="page-link" href="#">{{ index }}</a>
                                    </li>

                                    <li class="page-item"
                                        :class="{'disabled' : paginaActual === lastPage}"
                                    >
                                        <a v-on:click.prevent="goToPage(paginaActual + 1)" class="page-link" href="#">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
        </div>
    </div>

</template>

<script>

import store from '../store';

    export default {

        store,

        props: {
            usuarios: {},
        },

        data() {
            return {
               totalUsuarios: 0,
               perPage: 0,
               lastPage: 0,
               paginaActual: 1
            }
        },

        methods: {
            getUsers(page) {
                axios.get(`/api/usuarios/all_users?page=${page}`).then( response => {
                    this.totalUsuarios = response.data.total;
                    this.perPage = response.data.per_page;
                    this.lastPage = response.data.last_page;
                    this.$store.commit('setUsuarios', response.data.data);
                });
            },
            update(index, usuario) {
                const updatedUser = usuario;
                const indexOfItemInArray = this.users.findIndex(q => q.id === updatedUser.id);
                this.users.splice(indexOfItemInArray, 1, updatedUser);
            },
            goToPage(page) {
                this.getUsers(page);
                this.paginaActual = page;
            },

        },

        mounted() {
            this.getUsers(1);
        },

        computed: {
            users() {
                return this.$store.state.users;
            },
        }

    }
</script>
















