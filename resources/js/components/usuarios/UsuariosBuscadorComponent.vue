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

import store from '../store';

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
               perfiles: []
            }
        },

    }

</script>

