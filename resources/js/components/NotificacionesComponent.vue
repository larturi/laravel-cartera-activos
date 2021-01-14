<template>
      
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <span class="dropdown-item dropdown-header">Notificaciones</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item" v-if="notifications.length === 0">
            <i class="fas fa-flag-checkered mr-2"></i> 
            Sin notificaciones pendientes
        </a>

        <a :href="notification.data.link" class="dropdown-item" v-for="notification in notifications" :key="notification.id">
            <span>
                <small>
                    {{notification.data.text.substring(0,50) + '...'}}
                </small>
            </span>
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer"></a>

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
                axios.get(`/notificaciones/`).then( (response) => {
                    this.$store.commit('setNotifications', response.data);
                });
            },
        },

        mounted() {
            this.getNotifications();
        },

        computed: {
            notifications() {
                return this.$store.state.notifications;
            },
        }

    }
</script>

<style>

</style>