<template>
    <div>

        <div class="card-body p-0 table-responsive mb-0" style="display: block;" v-if="documentations.length > 0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                    <th scope="col">Documentación</th>
                    <th scope="col">Link</th>
                    <th scope="col">Comentarios</th>
                    <th v-if="canedit" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <documentation-component
                            v-for="(documentation) in documentations"
                            :key="documentation.id"
                            :canedit="canedit"
                            @delete="deleteDocumentation(documentation)"
                            :documentation="documentation">
                    </documentation-component>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="row mb-0">

                <div class="col-8 mr-4">
                    <p class="mt-1"
                        style="margin-left: 19px;"
                        v-if="documentations.length === 0">Aún no se ha cargado documentación</p>
                </div>

                <div v-if="canedit" class="col">
                    <documentation-add-component
                        @new="addDocumentation"
                        :sistema="sistemaid"
                    >
                    </documentation-add-component>
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
                documentations: [],
            }
        },

        mounted() {
            axios.get(`/api/documentations-sistema/${this.sistemaid}`).then( response => {
                this.documentations = response.data;
            });
        },

        methods: {

            addDocumentation(documentation) {
                this.documentations.push(...documentation);
            },
            deleteDocumentation(documentation) {
                this.documentations.splice(documentation, 1);
            },

        },


    }
</script>



