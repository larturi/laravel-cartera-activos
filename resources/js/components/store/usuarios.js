import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({

    state: {
        users: [],
        usersFiltrados: [],
        notifications: [],
        solicitudes: 0,
        termino: '',
        total_usuarios: 0,
        per_page: 0,
        last_page: 0,
        pagina_actual: 1
    },
    mutations: {
        setUsuarios(state, payload) {
            state.users = payload;
        },
        setTotalUsuarios(state, payload) {
            state.total_usuarios = Number(payload);
        },
        setPerPage(state, payload) {
            state.per_page = Number(payload);
        },
        setLastPage(state, payload) {
            state.last_page = Number(payload);
        },
        setPaginaActual(state, payload) {
            state.pagina_actual = Number(payload);
        },
        setNotifications(state, payload) {
            state.notifications = payload;
        },
        setSolicitudes(state, payload) {
            state.solicitudes = payload;
        },
    },



});