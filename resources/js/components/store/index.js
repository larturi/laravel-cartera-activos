import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({

    state: {
        users: [],
        usersFiltrados: [],
        termino: ''
    },
    mutations: {
        setUsuarios(state, payload) {
            state.users = payload;
        },
    },



});