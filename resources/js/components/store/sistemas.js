import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({

    state: {
        sistemas: [],
        sistemasFiltrados: [],
        termino: '',
        total_sistemas: 0,
        per_page_sistemas: 0,
        last_page_sistemas: 0,
        pagina_actual_sistemas: 1,
        loading: false,
        no_hay_sistemas: '',
    },
    mutations: {
        setSistemas(state, payload) {
            state.sistemas = payload;
        },
        setTotalSistemas(state, payload) {
            state.total_sistemas = Number(payload);
        },
        setPerPageSistemas(state, payload) {
            state.per_page_sistemas = Number(payload);
        },
        setLastPageSistemas(state, payload) {
            state.last_page_sistemas = Number(payload);
        },
        setPaginaActualSistemas(state, payload) {
            state.pagina_actual_sistemas = Number(payload);
        },
        setLoading(state, payload) {
            state.loading = payload;
        },
        setNoHaySistemas(state, payload) {
            state.no_hay_sistemas = payload;
        },
        setTermino(state, payload) {
            state.termino = payload;
        },
    },



});