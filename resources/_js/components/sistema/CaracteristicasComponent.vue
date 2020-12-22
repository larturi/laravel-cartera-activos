<template>

    <div>

        <div class="row">
            <div class="col">

                <span v-for="(caracteristica) in this.caracteristicas"
                        v-bind:key="caracteristica.caracteristica_id"
                        v-on:click="activar($event, caracteristica.id)"
                        class="badge ml-2 mt-3 p-2 font-weight-bold"
                        style="cursor: pointer"
                        :class="verificarClaseActiva(caracteristica.id)">
                            {{caracteristica.nombre}}
                </span>

                <input type="hidden" :name="nombre" :id="nombre">

            </div>
        </div>

    </div>

</template>

<script>
    export default {
        props: ['nombre',
                'caracteristicas',
                'oldcaracteristicas',
                'sistema',
                'canedit'
        ],

        data: function() {
            return {
                caracteristicasitems: new Set(),
            }
        },

        created: function() {
            if(this.oldcaracteristicas) {
                this.oldcaracteristicas.forEach(caracteristica => {
                    this.caracteristicasitems.add(caracteristica);
                });
            }
        },
        mounted: function() {
            document.querySelector('#' + this.nombre).value = this.oldcaracteristicas;
        },
        methods: {
            activar(e, id) {

                // Si no tiene permisos de edicion hago el return
                if(!this.canedit) {
                    return;
                }

                if(e.target.classList.contains('badge-secondary')) {
                    // Add
                    e.target.classList.remove('badge-secondary');
                    e.target.classList.add('badge-success');

                    const params = {
                        sistema_id: this.sistema,
                        caracteristica_id: id,
                    };

                    axios.post(`/api/${this.nombre}-sistema/add`, params)
                            .then( response => {
                                 this.caracteristicasitems.add(response.data);
                            });

                } else {
                    // Delete
                    e.target.classList.remove('badge-success');
                    e.target.classList.add('badge-secondary');
                    this.caracteristicasitems.delete(e.target.textContent.trim());

                    const params = {
                        sistema_id: this.sistema,
                        caracteristica_id: id
                    };

                    axios.post(`/api/${this.nombre}-sistema/delete`, params)
                            .then( response => {
                                this.caracteristicasitems.forEach(x => x.id === response.data[0].id ? this.caracteristicasitems.delete(x) : x)
                            });
                }

                // Agregar elementos al input hidden para el update
                const stringcaracteristicas = [...this.caracteristicasitems];
                document.querySelector('#' + this.nombre).value = stringcaracteristicas;
            },

            verificarClaseActiva(caracteristica) {

                var activo = false;

                this.caracteristicasitems.forEach(t => {
                    if(t.caracteristica_id === caracteristica) {
                        activo = true;
                    }
                });

                return activo ? 'badge-success' : 'badge-secondary';
            },

        }
    }
</script>

