<template>
    <div>
        <div class="input-group mt-2 mb-2">

            <input v-if="editMode" type="text"
                        class="form-control"
                        :class="[this.urlError ? 'is-invalid' : '', canedit ? 'disabled' : '']"
                        name="editar"
                        placeholder="Ingresar la URL del checksystem"
                        v-model="url">

            <input v-if="!editMode" type="text"
                        class="form-control"
                        :class="this.urlError ? 'is-invalid' : ''"
                        disabled
                        name="editar"
                        placeholder="Ingresar la URL del checksystem"
                        v-model="url">

            <div v-if="canedit" class="input-group-append">
                <a href="#" class="btn btn-danger" v-if="!editMode" v-on:click="onClickDelete()">Eliminar</a>
                <a href="#" class="btn btn-primary" v-if="!editMode" v-on:click.prevent="onClickEdit()">Editar</a>
                <a href="#" class="btn btn-secondary" v-if="editMode" v-on:click.prevent="onClickCancel()">Cancelar</a>
                <a href="#" class="btn btn-primary" v-if="editMode" v-on:click.prevent="onClickUpdate()">Guardar</a>
                <a href="#" class="btn btn-success" v-if="!editMode" v-on:click.prevent="onClickOpenUrl()">Abrir</a>
            </div>

        </div>

    </div>
</template>

<script>
import {validURL} from '../../helpers';

    export default {

        props: ['checksystem', 'sistemaid', 'canedit'],

        data() {
            return {
                editMode: false,
                url: '',
                urlOriginal: '',
                urlError: false
            }
        },

        computed: {
            getUrl: function () {
                return this.url;
            },
            setUrl: function (url) {
                this.url = url;
            },
        },

        created() {
          if (this.checksystem === '') {
                this.editMode = true;
          } else {
              this.url = this.checksystem;
          }
        },

        mounted() {
            this.urlOriginal = this.url;
        },

        methods: {

            validURL,

            onClickDelete() {
                axios.delete(`/api/checksystem/${this.sistemaid}`).then( (response) => {
                    this.url = '';
                });
            },
            onClickEdit () {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    url_checksystem: this.url,
                    sistemaid: this.sistemaid,
                };

                if (validURL(this.url)) {
                    this.urlError = false;
                    axios.put(`/api/checksystem`, params).then( (response => {
                        this.editMode = false;
                        const maestro = response.data;
                        this.$emit('update', maestro);
                    }));
                } else {
                    this.urlError = true;
                }
            },
            onClickCancel() {
               this.editMode = false;
               this.url = this.urlOriginal;
            },
            onClickOpenUrl() {
                window.open(this.url);
            },

        },


    }
</script>



