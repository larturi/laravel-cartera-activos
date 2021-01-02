<template>
    <div>
        <div class="row">
            <div class="col">
                <sistemas-buscador-component/>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Cartera de Sistemas</h3>
                    </div>
                    
                        <div v-if="this.sistemas.length === 0" class="card-body text-center" style="display: block;">
                            No se han encontrado sistemas
                        </div>
                    
                        <div v-if="this.sistemas.length > 0" class="card-body p-0 table-responsive" style="display: block;">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Sigla</th>
                                        <th scope="col">Auth</th>
                                        <th scope="col">Líder</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Criticidad</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody v-if="this.sistemas.length > 0">                
                                    <tr v-for="(sistema) in this.sistemas" :key="sistema.id">
                                        <td>{{ sistema.nombre }}</td>
                                        <td>{{ sistema.sigla }}</td>
                                        <td>
                                            <span class="badge badge-success">{{ sistema.authentication.nombre }}</span>
                                        </td>
                                        <td>{{ sistema.lider.name + ' ' + sistema.lider.apellido }}</td>
                                        <td>{{ sistema.cliente.nombre }}</td>
                                        <td>
                                            <span class="badge badge badge-success">{{ sistema.estado.nombre }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge badge-primary">{{ sistema.criticidad.nombre }}</span>
                                        </td>
                                        <td>
                                            <a :href="'sistemas/' + sistema.id" class="btn btn-primary btn-sm">Ver</a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                            <!-- Paginador -->
                            <div v-if="this.sistemas.length > 0" class="row">
                                <div class="col mt-4 ml-3">
                                    <nav class="" aria-label="">
                                        <ul class="pagination">
                                            <li class="page-item"
                                                :class="{'disabled' : pagina_actual_sistemas === 1}">
                                                <a v-on:click.prevent="goToPage(pagina_actual_sistemas - 1)" class="page-link" href="#">Anterior</a>
                                            </li>

                                            <li class="page-item"
                                                :class="{'active' : pagina_actual_sistemas === index}"
                                                v-for="index in last_page_sistemas" :key="index"
                                            >
                                                <a v-on:click.prevent="goToPage(index)" class="page-link" href="#">{{ index }}</a>
                                            </li>

                                            <li class="page-item"
                                                :class="{'disabled' : pagina_actual_sistemas === last_page_sistemas}"
                                            >
                                                <a v-on:click.prevent="goToPage(pagina_actual_sistemas + 1)" class="page-link" href="#">Siguiente</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
import store from '../store/sistemas';

export default {

store,

        data() {
            return {

            }
        },

        methods: {
            getSistemas(page = 1) {
                axios.get(`/api/sistemas/all_sistemas?page=${page}`, {
                            params: {
                                cliente_id: Number(localStorage.getItem("cliente_id")),
                                lider_id: Number(localStorage.getItem("lider_id")),
                                recurso_id: Number(localStorage.getItem("recurso_id")),
                                estado_id: Number(localStorage.getItem("estado_id")),
                                criticidad_id: Number(localStorage.getItem("criticidad_id")),
                                lenguaje_id: Number(localStorage.getItem("lenguaje_id")),
                                base_id: Number(localStorage.getItem("base_id")),
                                login_id: Number(localStorage.getItem("login_id")),
                                impacto_id: Number(localStorage.getItem("impacto_id")),
                            }
                        }).then( (response) => {
                            this.$store.commit('setSistemas', response.data.data);
                            this.$store.commit('setTotalSistemas', response.data.total);
                            this.$store.commit('setPerPageSistemas', response.data.per_page);
                            this.$store.commit('setLastPageSistemas', response.data.last_page);
                            this.$store.commit('setPaginaActualSistemas', page);
                        });
            },
            goToPage(page) {
                this.getSistemas(page);
                this.$store.commit('setPaginaActualSistemas', page);
            },
        },

        mounted() {
            this.getSistemas();
        },

        computed: {
            sistemas() {
                return this.$store.state.sistemas;
            },
            pagina_actual_sistemas() {
                return this.$store.state.pagina_actual_sistemas;
            },
            last_page_sistemas() {
                return this.$store.state.last_page_sistemas;
            },
        }

    }
</script>

<style>

</style>