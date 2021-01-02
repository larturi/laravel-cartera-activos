<template>
  <div>

    <div class="card-body">

        <form action=""
            method="POST"
            id="formFiltros"
            class="form-group">

            <div class="card-text">

                    <div class="row">

                        <div class="col-lg-6">
                            <div>
                                <input
                                    type="text"
                                    placeholder="Buscar por nombre, email o usuario"
                                    class="form-control"
                                    v-model="termino"
                                    @keyup="procesarInput"
                                    autofocus>
                            </div>

                        </div>

                    </div>

            </div>

        </form>

    </div>

  </div>
</template>

<script>

import store from '../store/usuarios';

export default {

        store,

        props: {
            texto: '',
        },

        data() {
            return {
               edit: false,
               selectedPerfil: null,
               error: false,
               approved: false,
               habilitado: true,
               perfiles: [],
               termino: '',
            }
        },

        methods: {
            procesarInput() {
                const texto = this.termino || 'all_users';
                axios.get(`/api/usuarios/${texto}?page=1`).then( response => {
                    this.$store.commit('setUsuarios', response.data.data);
                    this.$store.commit('setTotalUsuarios', response.data.total);
                    this.$store.commit('setPerPage', response.data.per_page);
                    this.$store.commit('setLastPage', response.data.last_page);
                    this.$store.commit('setPaginaActual', 1);
                });
            }
        },

    }

</script>

