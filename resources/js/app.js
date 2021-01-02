// @author: Leandro Arturi (u57322)

require('./bootstrap');

window.Vue = require('vue');

import { BootstrapVue } from 'bootstrap-vue';
Vue.use(BootstrapVue);

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

Vue.component('loading-component', require('./components/LoadingComponent.vue').default);

// Maestros
Vue.component('maestro-component', require('./components/maestros/MaestroComponent.vue').default);
Vue.component('maestro-alta-component', require('./components/maestros/MaestroAltaComponent.vue').default);
Vue.component('maestros-component', require('./components/maestros/MaestrosComponent.vue').default);

// Caracteristicas
Vue.component('caracteristicas-component', require('./components/sistema/CaracteristicasComponent.vue').default);

// Comentarios
Vue.component('comentarios-component', require('./components/sistema/ComentariosComponent.vue').default);

// Recursos
Vue.component('recursos-component', require('./components/sistema/RecursosComponent.vue').default);
Vue.component('recurso-component', require('./components/sistema/RecursoComponent.vue').default);
Vue.component('recurso-add-component', require('./components/sistema/RecursoAddComponent.vue').default);

// Relacion con otros sistemas
Vue.component('relaciones-component', require('./components/sistema/RelacionesComponent.vue').default);
Vue.component('relacion-component', require('./components/sistema/RelacionComponent.vue').default);
Vue.component('relacion-add-component', require('./components/sistema/RelacionAddComponent.vue').default);

// Checksystem
Vue.component('checksystem-component', require('./components/sistema/ChecksystemComponent.vue').default);

// Control Versiones
Vue.component('repositorios-component', require('./components/sistema/RepositoriosComponent.vue').default);
Vue.component('repositorio-component', require('./components/sistema/RepositorioComponent.vue').default);
Vue.component('repositorio-add-component', require('./components/sistema/RepositorioAddComponent.vue').default);

// Documentacion
Vue.component('documentations-component', require('./components/sistema/DocumentationsComponent.vue').default);
Vue.component('documentation-component', require('./components/sistema/DocumentationComponent.vue').default);
Vue.component('documentation-add-component', require('./components/sistema/DocumentationAddComponent.vue').default);

// Hitos
Vue.component('hitos-component', require('./components/sistema/HitosComponent.vue').default);
Vue.component('hito-component', require('./components/sistema/HitoComponent.vue').default);
Vue.component('hito-add-component', require('./components/sistema/HitoAddComponent.vue').default);

// Ambientes Servidores
Vue.component('ambientes-component', require('./components/sistema/AmbientesComponent.vue').default);
Vue.component('ambiente-component', require('./components/sistema/AmbienteComponent.vue').default);
Vue.component('ambiente-add-component', require('./components/sistema/AmbienteAddComponent.vue').default);

// Usuarios
Vue.component('usuarios-component', require('./components/usuarios/UsuariosComponent.vue').default);
Vue.component('usuario-component', require('./components/usuarios/UsuarioComponent.vue').default);
Vue.component('usuarios-buscador-component', require('./components/usuarios/UsuariosBuscadorComponent.vue').default);

// Sistemas
Vue.component('sistemas-component', require('./components/sistema/SistemasComponent.vue').default);
Vue.component('sistemas-buscador-component', require('./components/sistema/SistemasBuscadorComponent.vue').default);

import 'bootstrap-vue/dist/bootstrap-vue.css';

const app = new Vue({
    el: '#app',
});

$(document).ready(function() {
    let showFilter = localStorage.getItem('showFilter');

    if (showFilter === '0') {
        $("#filterCard").addClass("collapsed-card");
    } else {
        $("#filterCard").removeClass("collapsed-card");
    }
});

$('#btnCollapseFiltros').on("click", function() {
    let showFilter = localStorage.getItem('showFilter');

    if (showFilter === '0') {
        localStorage.setItem('showFilter', '1');
    } else {
        localStorage.setItem('showFilter', '0');
    }
});

$('#btnLimpiarFiltros').on("click", function() {
    $('input[name=nombre]').val('');
    $('select[name=cliente_id]').val('');
    $('select[name=lider_id]').val('');
    $('select[name=recurso_id]').val('');
    $('select[name=estado_id]').val('');
    $('select[name=criticidad_id]').val('');
    $('select[name=lenguaje_id]').val('');
    $('select[name=base_id]').val('');
    $('select[name=login_id]').val('');
    $('select[name=impacto_id]').val('');

    window.location.replace("/");

});