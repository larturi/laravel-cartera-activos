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
            <a href="#" class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</a>
            <a href="#" class="btn btn-primary" v-if="!editMode" v-on:click.prevent="onClickEdit()">Editar</a>
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
                    'nombre': ''
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
            onClickDelete() {
                axios.delete(`/api/${this.pluralname}/${this.maestro.id}`).then( () => {
                    this.$emit('delete');
                });
            },
            onClickEdit () {
                this.editMode = true;
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
