<template>

    <div class="input-group mb-2">

        <input v-if="editMode" type="text"
                    class="form-control"
                    :class="this.error ? 'is-invalid' : ''"
                    name="editar"
                    v-on:keyup="pressEnterHandler"
                    v-model="maestro.nombre">

        <input v-if="!editMode" type="text"
                    class="form-control"
                    :class="this.error ? 'is-invalid' : ''"
                    disabled
                    name="editar"
                    v-on:keyup="pressEnterHandler"
                    v-model="maestro.nombre">

        <div v-if="!readonly" class="input-group-append">
            <a href="#" class="btn btn-success" v-if="maestro.habilitado && !editMode" v-on:click.prevent="onClickDeshabilitar()">Habilitado</a>
            <a href="#" class="btn btn-danger" v-if="!maestro.habilitado && !editMode" v-on:click.prevent="onClickHabilitar()">Deshabilitado</a>
            <a href="#" class="btn btn-primary" v-if="!editMode && maestro.habilitado" v-on:click.prevent="onClickEdit()">Editar</a>
            <a href="#" class="btn btn-secondary" v-if="editMode" v-on:click.prevent="onClickCancel()">Cancelar</a>
            <a href="#" class="btn btn-primary" v-if="editMode" v-on:click.prevent="onClickUpdate()">Guardar</a>
        </div>

    </div>

</template>

<script>
    export default {
        props: {
            pluralname: '',
            readonly: false,
            maestro: {
                    'id': '',
                    'nombre': '',
                    'habilitado': true
                },
        },
        data() {
            return {
                editMode: false,
                error: false
            }
        },
        mounted() {

        },
        methods: {
            onClickDeshabilitar() {
                const params = {
                    nombre: this.maestro.nombre,
                    habilitado: false
                };
                axios.put(`/api/${this.pluralname}/${this.maestro.id}`, params).then( (response) => {
                    this.maestro.habilitado = false;
                });
            },
            onClickHabilitar() {
                const params = {
                    nombre: this.maestro.nombre,
                    habilitado: true
                };
                axios.put(`/api/${this.pluralname}/${this.maestro.id}`, params).then( (response) => {
                    this.maestro.habilitado = true;
                });
            },
            onClickEdit () {
                this.editMode = true;
            },
            onClickCancel () {
                this.editMode = false;
            },
            onClickUpdate() {
                const params = {
                    nombre: this.maestro.nombre
                };

                axios.put(`/api/${this.pluralname}/${this.maestro.id}`, params).then( (response => {

                    if(response.data.error) {
                        this.error = true;
                    } else {
                        this.editMode = false;
                        const maestro = response.data;
                        this.$emit('update', maestro);
                        this.error = false;
                    }
                }));
            },
            pressEnterHandler: function(e) {
                if (e.keyCode === 13) {
                    this.onClickUpdate();
                }
            }
        },
    }
</script>

<style scoped>
    .btn {
        width: 140px !important;
    }
</style>
