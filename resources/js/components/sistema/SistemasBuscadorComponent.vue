<template>

    <div class="card card-primary" id="filterCard">

        <div class="card-header">
        <h3 class="card-title">Filtros de Búsqueda</h3>

        <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" id="btnCollapseFiltros">
                <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">

            <form action=""
                  method="POST"
                  id="formFiltros"
                  class="form-group">

                <div class="card-text">

                    <div class="row">

                        <div class="col-lg-3">
                            <div>
                                <label>
                                    Sistema:
                                </label>
                                <input
                                    type="text"
                                    placeholder="Buscar por nombre"
                                    class="form-control"
                                    v-model="termino"
                                    @keyup="procesarBusqueda"
                                    autofocus>
                            </div>

                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>Area Solicitante:</label>
                                <b-form-select 
                                    v-model="cliente_id" 
                                    :options="clientes" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>

                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>Líder:</label>
                                <b-form-select 
                                    v-model="lider_id" 
                                    :options="lideres" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label>Recurso:</label>
                                <b-form-select 
                                    v-model="recurso_id" 
                                    :options="recursos" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label>Estado:</label>
                                <b-form-select 
                                    v-model="estado_id" 
                                    :options="estados" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label>Criticidad:</label>
                                <b-form-select 
                                    v-model="criticidad_id" 
                                    :options="criticidades" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label>Lenguaje:</label>
                                <b-form-select 
                                    v-model="lenguaje_id" 
                                    :options="lenguajes" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label>Motor BD:</label>
                                <b-form-select 
                                    v-model="motor_id" 
                                    :options="motores" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label>Login:</label>
                                <b-form-select 
                                    v-model="login_id" 
                                    :options="authentications" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label>Impacto:</label>
                                <b-form-select 
                                    v-model="impacto_id" 
                                    :options="impactos" 
                                    @change="procesarBusqueda"
                                    class="custom-select">
                                </b-form-select>
                            </div>
                        </div>

                    </div> 

                    <div class="row float-right">
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-secondary btn-sm" id="btnLimpiarFiltros">
                                <i class="fa fa-times"></i>
                                Limpiar
                            </button>

                            <a :href="'/exports/sistemas'" class="btn btn-success btn-sm">
                                <i class="fa fa-file-excel"></i>
                                Exportar
                            </a>

                        </div>
                    </div> 

                </div>

            </form>

        </div>

    </div>

</template>

<script>

import store from '../store/sistemas';

export default {

        store,

        props: {
            texto: '',
        },

        data() {
            return {
               termino: '',
               clientes: [],
               cliente_id: 0,
               lideres: [],
               lider_id: 0,
               recursos: [],
               recurso_id: 0,
               estados: [],
               estado_id: 0,
               criticidades: [],
               criticidad_id: 0,
               lenguajes: [],
               lenguaje_id: 0,
               motores: [],
               motor_id: 0,
               authentications: [],
               login_id: 0,
               impactos: [],
               impacto_id: 0,
            }
        },

        methods: {
            procesarBusqueda() {
                let texto = this.termino;

                if (texto === '') {
                    texto = 'all_sistemas';
                }

                axios.get(`/api/sistemas/${texto}?page=1`, {
                            params: {
                                cliente_id: this.cliente_id,
                                lider_id: this.lider_id,
                                recurso_id: this.recurso_id,
                                estado_id: this.estado_id,
                                criticidad_id: this.criticidad_id,
                                lenguaje_id: this.lenguaje_id,
                                base_id: this.motor_id,
                                login_id: this.login_id,
                                impacto_id: this.impacto_id,
                            }
                        }).then( response => {
                                    console.log('Buscador', response.data.data);
                                    this.$store.commit('setSistemas', response.data.data);
                                    this.$store.commit('setTotalSistemas', response.data.total);
                                    this.$store.commit('setPerPageSistemas', response.data.per_page);
                                    this.$store.commit('setLastPageSistemas', response.data.last_page);
                                    this.$store.commit('setPaginaActualSistemas', 1);
                                });
            },
            getClientes() {
                axios.get(`/api/clientes`).then( response => {
                    let clientesSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( cliente => {
                        clientesSelect.push({ value: cliente.id, text: cliente.nombre })
                    });

                    this.clientes = clientesSelect;
                 });
            },
            getLideres() {
                axios.get(`/api/lideres`).then( response => {
                    let lideresSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( lider => {
                        lideresSelect.push({ value: lider.id, text: lider.name + ' ' + lider.apellido })
                    });

                    this.lideres = lideresSelect;
                 });
            },
            getRecursos() {
                axios.get(`/api/miembros`).then( response => {
                    let recursosSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( recurso => {
                        recursosSelect.push({ value: recurso.id, text: recurso.name + ' ' + recurso.apellido })
                    });

                    this.recursos = recursosSelect;
                 });
            },
            getEstados() {
                axios.get(`/api/estados`).then( response => {
                    let estadosSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( estado => {
                        estadosSelect.push({ value: estado.id, text: estado.nombre })
                    });

                    this.estados = estadosSelect;
                 });
            },
            getCriticidades() {
                axios.get(`/api/criticidad`).then( response => {
                    let criticidadesSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( criticidad => {
                        criticidadesSelect.push({ value: criticidad.id, text: criticidad.nombre })
                    });

                    this.criticidades = criticidadesSelect;
                 });
            },
            getLenguajes() {
                axios.get(`/api/lenguajes`).then( response => {
                    let lenguajesSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( lenguaje => {
                        lenguajesSelect.push({ value: lenguaje.id, text: lenguaje.nombre })
                    });

                    this.lenguajes = lenguajesSelect;
                 });
            },
            getMotores() {
                axios.get(`/api/bases`).then( response => {
                    let motoresSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( motor => {
                        motoresSelect.push({ value: motor.id, text: motor.nombre })
                    });

                    this.motores = motoresSelect;
                 });
            },
            getAuthentications() {
                axios.get(`/api/authentications`).then( response => {
                    let authenticationsSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( authentication => {
                        authenticationsSelect.push({ value: authentication.id, text: authentication.nombre })
                    });

                    this.authentications = authenticationsSelect;
                 });
            },
            getImpactos() {
                axios.get(`/api/impactos`).then( response => {
                    let impactosSelect = [{ value: null, text: '-- Seleccionar --' }];

                    response.data.forEach( impacto => {
                        impactosSelect.push({ value: impacto.id, text: impacto.nombre })
                    });

                    this.impactos = impactosSelect;
                 });
            },
        },

        mounted() {
            this.getClientes();
            this.getLideres();
            this.getRecursos();
            this.getEstados();
            this.getCriticidades();
            this.getLenguajes();
            this.getMotores();
            this.getAuthentications();
            this.getImpactos();
        },

    }

</script>

