<template>

    <tr>
        <td>{{ usuario.user }}</td>
        <td>
            <div class="mt-2">{{ usuario.apellido + ' ' + usuario.name }}</div>
            <p class="mt-0 text-muted">{{ usuario.email }}</p>
        </td>
        <td v-if="!this.edit">
            {{ usuario.perfil }}
        </td>
        <td v-else>
            <form action="" @submit.prevent="updatePerfil()">
                <div class="row">
                    <div class="col-9">
                        <b-form-select v-model="selectedPerfil" :options="perfiles" class="mini">
                        </b-form-select>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary btn-sm" style="max-width: 35px !important; min-width: 35px !important;">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>
        </td>
        <td v-if="usuario.habilitado === 0">
            <span class="badge bg-primary">Pendiente</span>
        </td>
        <td v-else-if="usuario.habilitado === 1">
            <span class="badge bg-success">Habilitado</span>
        </td>
        <td v-else>
            <span class="badge bg-danger">Baja</span>
        </td>

        <td>
            <a v-if="edit === false && usuario.habilitado === 1"
               href="#"
               class="mr-2 btn btn-primary btn-sm btn-block mb-2 mt-2"
               v-on:click.prevent="onClickAsignarRol()">Asignar Rol
            </a>
            <a v-if="edit"
               href="#"
               class="mr-2 btn btn-secondary btn-sm btn-block mb-2 mt-2"
               v-on:click.prevent="onClickCancelar()">Cancelar
            </a>
            <a v-if="usuario.habilitado === 1"
               href="#"
               class="mr-2 btn btn-danger btn-sm btn-block mb-2 mt-2"
               v-on:click.prevent="onClickBaja()">Baja
            </a>
            <a v-if="(usuario.habilitado === 0) || usuario.habilitado === 2"
               href="#"
               class="mr-2 btn btn-success btn-sm btn-block mb-2 mt-2"
               v-on:click.prevent="onClickHabilitar()">Habilitar
            </a>
            <p v-if="usuario.habilitado === 0 && usuario.email_verified_at === null"
               class="mr-2 mb-2 mt-2 text-center small"
            >
                (El usuario no confirmó su email)
            </p>
            <a v-if="usuario.habilitado === 0 && usuario.perfil === 'PENDIENTE' && usuario.email_verified_at !== null"
               href="#"
               class="mr-2 btn btn-danger btn-sm btn-block mb-2 mt-2"
               v-on:click.prevent="onClickRechazar()">Rechazar
            </a>
            <a v-if="usuario.habilitado === 1 && usuario.role === 1 && !edit"
               href="#"
               class="mr-2 btn btn-primary btn-sm btn-block mb-2 mt-2"
               v-on:click.prevent="onClickAsignarRol()">Rol
            </a>
        </td>
    </tr>

</template>

<script>

    export default {

        props: {
            usuario: {},
        },

        data() {
            return {
               edit: false,
               selectedPerfil: null,
               error: false,
               approved: false,
               habilitado: true,
               perfiles: []
            }
        },

        methods: {
            onClickAsignarRol() {
                this.edit = true;
            },
            onClickCancelar() {
                this.edit = false;
            },
            updatePerfil() {
                const params = {
                    id_perfil: this.selectedPerfil,
                    id_usuario: this.usuario.id,
                };

                if (this.id_perfil !== '') {
                    this.error = false;
                    axios.put(`/usuarios/${this.usuario.id}`, params).then( (response => {
                        const usuario = response.data;
                        this.$emit('update', usuario);
                        this.edit = false;
                        this.approved = true;
                    }));
                } else {
                    this.error = true;
                }
            },
            onClickBaja() {
                const params = {
                    id_usuario: this.usuario.id
                };

                axios.post(`/usuarios/update/baja`, params).then( (response => {
                    const usuario = response.data;
                    this.$emit('update', usuario);
                    this.habilitado = false;
                }));
            },
            onClickHabilitar() {
                const params = {
                    id_usuario: this.usuario.id
                };

                axios.post(`/usuarios/update/habilitar`, params).then( (response => {
                    const usuario = response.data;
                    this.$emit('update', usuario);
                    this.habilitado = true;
                }));
            },
            onClickRechazar() {
                const params = {
                    id_usuario: this.usuario.id
                };

                axios.post(`/usuarios/update/rechazar`, params).then( (response => {
                    const usuario = response.data;
                    this.$emit('update', usuario);
                    this.habilitado = true;
                }));
            },
        },

        mounted() {
            axios.get(`/api/perfiles`).then( response => {
                let perfilesSelect = [{ value: null, text: '-- Seleccionar Perfil --' }];

                response.data.forEach( perfil => {
                    perfilesSelect.push({ value: perfil.nombre, text: perfil.nombre })
                });

                this.perfiles = perfilesSelect;
            });
        },

    }
</script>


