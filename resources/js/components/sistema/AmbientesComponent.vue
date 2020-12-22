<template>
    <div>

        <div class="card-body p-0 table-responsive mb-0" style="display: block;" v-if="ambientes.length > 0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                    <th scope="col">Ambiente</th>
                    <th scope="col">Url</th>
                    <th v-if="canedit" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <ambiente-component
                            v-for="(ambiente) in ambientes"
                            :key="ambiente.id"
                            :canedit="canedit"
                            @delete="deleteAmbiente(ambiente)"
                            @update-ambiente-selected="onUpdatePropAmbienteSelected(ambiente)"
                            :ambiente="ambiente">
                    </ambiente-component>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row mb-0">

                <div class="col-8 mr-4">
                    <p class="mt-1"
                        style="margin-left: 19px;"
                        v-if="ambientes.length === 0">Aún no se ha cargado ambientes</p>
                </div>

                <div class="col">
                    <ambiente-add-component
                        @new="addAmbiente"
                        :sistema="sistemaid"
                        v-if="canedit"
                        @update="updateAmbiente(...arguments)"
                        :ambienteEdit="ambienteEdit"
                        :isEditing="isEditing"
                        @update-isEditing="onUpdatePropIsEditing(state = false)"
                    >
                    </ambiente-add-component>
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
                ambientes: [],
                ambienteEdit: {},
                isEditing: false,
            }
        },

        mounted() {
            axios.get(`/api/ambientes-sistema/${this.sistemaid}`).then( response => {
                this.ambientes = response.data;
            });
        },

        methods: {

            addAmbiente(ambiente) {
                this.refresh();
            },
            deleteAmbiente(ambiente) {
                this.refresh();
            },
            updateAmbiente(ambiente) {
                this.refresh();
            },
            onUpdatePropAmbienteSelected(ambiente) {
                this.ambienteEdit = {...ambiente};
                this.isEditing = true;
            },
            onUpdatePropIsEditing(state) {
                this.isEditing = state;
            },
            refresh() {
                axios.get(`/api/ambientes-sistema/${this.sistemaid}`).then( response => {
                    this.ambientes = response.data;
                });
            }

        },


    }
</script>



