<template>
    <div>

        <div class="card-body p-0 table-responsive mb-0" style="display: block;" v-if="hitos.length > 0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción del Hito</th>
                    <th v-if="canedit" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <hito-component
                            v-for="(hito) in hitos"
                            :key="hito.id"
                            :canedit="canedit"
                            @delete="deleteHito(hito)"
                            @update-hito-selected="onUpdatePropHitoSelected(hito)"
                            :hito="hito">
                    </hito-component>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row mb-0">

                <div class="col-8 mr-4">
                    <p class="mt-1"
                        style="margin-left: 19px;"
                        v-if="hitos.length === 0">Aún no se han registrado hitos</p>
                </div>

                <div v-if="canedit" class="col">
                    <hito-add-component
                        @new="addHito"
                        @update="updateHito(...arguments)"
                        :sistema="sistemaid"
                        :hitoEdit="hitoEdit"
                        :isEditing="isEditing"
                        @update-isEditing="onUpdatePropIsEditing(state = false)"
                    >
                    </hito-add-component>
                </div>

            </div>
        </div>


    </div>
</template>

<script>
    export default {

        props: ['sistemaid', 'canedit'],

        data() {
            return {
                hitos: [],
                hitoEdit: {},
                isEditing: false,
            }
        },

        mounted() {
            axios.get(`/api/hitos-sistema/${this.sistemaid}`).then( response => {
                this.hitos = response.data;
            });
        },

        methods: {

            addHito(hito) {
                this.refresh();
            },
            deleteHito(hito) {
                this.refresh();
            },
            updateHito(hito) {
                this.refresh();
            },
            onUpdatePropHitoSelected(hito) {
                this.hitoEdit = {...hito};
                this.isEditing = true;
            },
            onUpdatePropIsEditing(state) {
                this.isEditing = state;
            },
            refresh() {
                axios.get(`/api/hitos-sistema/${this.sistemaid}`).then( response => {
                    this.hitos = response.data;
                });
            }

        },

    }
</script>



