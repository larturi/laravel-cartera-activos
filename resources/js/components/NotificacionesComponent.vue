<template>

    <div>

        <a v-if="solicitudes > 0" class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{ solicitudes }}</span>
        </a>
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <li class="dropdown-menu-header">
                <div class="dropdown-header m-0 p-2">
                    <h5 class="white mt-2">Notificaciones</h5>
                </div>
            </li>
            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item" v-if="solicitudes === 0">
                <i class="fas fa-flag-checkered mr-2"></i> 
                Sin notificaciones pendientes
            </a>

            <a v-if="solicitudes > 0" href="/solicitudes" class="dropdown-item p-3">
                <i class="fas fa-user mr-2"></i> {{ solicitudes }} solicitudes pendientes
            </a>

            <div class="dropdown-divider"></div>

        </div>

   </div>

</template>

<script>
import store from '../components/store/usuarios';

export default {

        store,

        data() {
            return {

            }
        },

        methods: {
            getNotifications() {
                // Por ahora no se utiliza
                axios.get(`/notificaciones/`).then( (response) => {
                    this.$store.commit('setNotifications', response.data);
                });
            },
            getSolicitudesPendientes() {
                axios.get(`/api/usuarios/aprobacion_pendiente`).then( (response) => {
                    this.$store.commit('setSolicitudes', response.data.total);
                });
            },
            marcarLeida(notificationId) {
                axios.get(`/notificacion/${notificationId}`).then( (response) => {
                    console.log(notificationId);
                });
            }
        },

        mounted() {
            this.getSolicitudesPendientes();
        },

        computed: {
            notifications() {
                return this.$store.state.notifications;
            },
            solicitudes() {
                return this.$store.state.solicitudes;
            },
        }

    }
</script>

<style scoped>

    .dropdown-menu-header {
        background: #374654;
    }

    h4 {
        color: #fff !important;
    }

    .white {
        color: #fff !important;
    }

</style>