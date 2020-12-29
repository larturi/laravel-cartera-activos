import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({

    state: {
        users: [],
        usersFiltrados: [],
    },
    mutations: {
        setUsuarios(state, payload) {
             state.users = payload;
        },
        // setUsuariosFiltrados(state, payload) {
        //     state.usuariosFiltrados = payload;
        // }
    },

    // actions: {
    //         async getUsuarios({ commit }) {
    //           try {
    //             //const res = await fetch('api.json');
    //             const data = await res.json();
    //             commit('setUsuarios', data);
    //           } catch (error) {
    //             console.log(error);
    //           }
    // },

    // filtro({ commit, state }, texto) {
    //           const textoCliente = texto.toLowerCase();
    //           const filtro = state.usuarios.filter(usuario => {
    //             const textoApi = usuario.name.toLowerCase();
    //             if (textoApi.includes(textoCliente)) {
    //               return usuario;
    //             }
    //           });
    //           commit('setUsuariosFiltrados', filtro);
    //         }
    // },

});
