<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SistemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sistemas')->insert([
            'nombre'                      => 'Cartera de Sistemas',
            'sigla'                       => 'CDS',
            'descripcion'                 => 'Sistema que permite administrar la cartera de sistemas del Instituto.',
            'cliente_id'                  => 4,
            'cliente_info'                => '',
            'lider_id'                    => 1,
            'criticidad_id'               => 2,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 4,
            'f_produccion'                => '2021-02-01',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 1,
            'role_id'        => 1,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);


        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 2,
            'role_id'        => 2,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 3,
            'role_id'        => 3,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 4,
            'role_id'        => 4,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 5,
            'role_id'        => 5,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 1,
            'role_id'        => 5,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 6,
            'role_id'        => 5,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 7,
            'role_id'        => 6,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 15,
            'role_id'        => 6,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 11,
            'role_id'        => 9,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 10,
            'role_id'        => 8,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 8,
            'role_id'        => 6,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 2,
            'caracteristica_type'   => 'App\Models\Base',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 3,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 9,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 2,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 10,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 7,
            'caracteristica_type'   => 'App\Models\Impacto',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_hitos')->insert([
            'sistema'      => 1,
            'titulo'       => 'Primer Deploy',
            'fecha'        => '2021-02-01',
            'user_id'      => 1,
            'descripcion'  => 'Primer Deploy',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        DB::table('sistema_ambientes')->insert([
            'sistema_id'   => 1,
            'ambiente_id'  => 1,
            'url'          => 'http://carteradesistemas.dev.pami.ar',
            'user_id'      => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        DB::table('sistema_ambientes')->insert([
            'sistema_id'   => 1,
            'ambiente_id'  => 2,
            'url'          => 'http://carteradesistemas.qa.pami.ar',
            'user_id'      => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);


        DB::table('sistemas')->insert([
            'nombre'                      => 'Receta Electronica',
            'sigla'                       => 'REC',
            'descripcion'                 => 'La Receta Electrónica es una herramienta que permite el circuito de dispensa de medicamentos. Utiliza el vademécum de medicamentos del Instituto y contiene reglas médicas de prescripción (dosis máxima, interacciones medicamentosas y recomendaciones). Se puede firmar digitalmente para que el afiliado se acerque a la farmacia a retirar el medicamento mostrando su celular o correo electrónico con los datos de la receta. A su vez contiene dos módulos de negocio independiente (Acciones Terapéuticas No Medicamentosas y Pañales. Este último vinculado directamente con el Sistema de Pañales). ',
            'cliente_id'                  => 1,
            'cliente_info'                => '',
            'lider_id'                    => 12,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => 'Es utilizado por los Médicos de Cabecera y especialistas para la prescripción de medicamentos al momento de la atención del afiliado. La provisión de medicamentos representa en promedio entre un 35% y 40% del presupuesto del Instituto.',
            'authentication_id'           => 2,
            'f_produccion'                => '2010-01-01',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Medicamentos Sin Cargo',
            'sigla'                       => 'MSC',
            'descripcion'                 => 'El Sistema de Gestión de Medicamentos Sin Cargo (MSC) es una aplicación web alojada en la Plataforma CUP creada con la finalidad de sistematizar la solicitud, evaluación, autorización y renovación de los medicamentos con cobertura al 100% para los/las afiliados/as de PAMI a través de las distintas vías administrativas disponibles, también conocidas como Registros de Tratamientos Farmacológicos (RTF): Subsidio Social, Vía de Excepción, Discapacidad, Urgencias Locales y Amparo Judicial.            ',
            'cliente_id'                  => 1,
            'cliente_info'                => '',
            'lider_id'                    => 14,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => 'Representa el mayor porcentaje de trámites que realizan las personas afiliadas en las distintas dependencias del INSSJP. En caso de no poder hacer uso del sistema, se verán demoradas todas las autorizaciones de medicación.',
            'authentication_id'           => 2,
            'f_produccion'                => '2012-11-1',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Sistema de Gestión de Atención',
            'sigla'                       => 'SGA',
            'descripcion'                 => 'El Sistema de Gestión de Atención (SGA) es una aplicación web alojada en la Plataforma de Sistemas CUP creada con el fin administrar la atención de las personas afiliadas en agencias y UGL, a través de la gestión de turnos y el registro de los trámites realizados.',
            'cliente_id'                  => 5,
            'cliente_info'                => '',
            'lider_id'                    => 2,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 2,
            'f_produccion'                => '2013-07-1',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Portal de Prestadores y Proveedores',
            'sigla'                       => 'POPP',
            'descripcion'                 => 'El Portal de Prestadores y Proveedores es una aplicación del Sistema Interactivo de Información que permite registrar a los Prestadores y Proveedores y los ofrecimientos de servicios para su posterior evaluación y posible contratación.',
            'cliente_id'                  => 2,
            'cliente_info'                => '',
            'lider_id'                    => 13,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 1,
            'f_produccion'                => '2016-09-1',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Clave Unica Pami',
            'sigla'                       => 'CUP',
            'descripcion'                 => 'Clave Única PAMI (CUP) es un sistema de inicio de sesión unificada (Single Sign On) que cuenta con un proceso de acceso segurizado a través del cual aproximadamente 67 mil usuarios internos y externos solicitan autorización para acceder al uso de sus más de 60 aplicaciones, las cuales poseen dueños de datos específicos que se gestionan a través del Sistema de Administración de Seguridad (SADES).',
            'cliente_id'                  => 4,
            'cliente_info'                => '',
            'lider_id'                    => 16,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 2,
            'f_produccion'                => '2013-03-1',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Sistema de Administración de Recursos Humanos',
            'sigla'                       => 'SARHA',
            'descripcion'                 => 'El Sistema Administración de Recursos Humanos AFIP (SARHA) fue provisto por AFIP y es mantenido en la Gerencia de Sistemas de PAMI. Consiste en dos plataformas de accesos para los usuarios: Una aplicación es cliente/servidor que se instala a los usuarios de RRHH y Portal de información para el empleado (http://milegajo.pami.ar)',
            'cliente_id'                  => 3,
            'cliente_info'                => '',
            'lider_id'                    => 17,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 3,
            'f_produccion'                => '2008-01-1',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Portal Intranet',
            'sigla'                       => 'INTRA',
            'descripcion'                 => 'Intranet es la principal puerta de acceso a los Sistemas Online, Portales de Gerencias, Normativa y Servicios que provee la Gerencia de Sistemas. Es el portal más importante que posee el Instituto a nivel interno y su principal función es facilitar la comunicación entre las distintas áreas del Instituto como así también con cada uno de los trabajadoras y trabajadores.',
            'cliente_id'                  => 3,
            'cliente_info'                => '',
            'lider_id'                    => 4,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 5,
            'f_produccion'                => '2000-06-1',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistemas')->insert([
            'nombre'                      => 'Sistema de Gestión Hospitalaria',
            'sigla'                       => 'SISGH',
            'descripcion'                 => 'El Sistema de Gestión Hospitalaria (SISGH) es un sistema totalmente integrado en un solo ejecutable donde se registran la totalidad de movimientos administrativos y actos médicos de los Efectores Sanitarios Propios, cuyas prácticas se transmiten a PAMI Central mientras mantiene el total de registros de la Historia Clínica Electrónica.',
            'cliente_id'                  => 9,
            'cliente_info'                => '',
            'lider_id'                    => 19,
            'criticidad_id'               => 1,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 5,
            'f_produccion'                => '2004-03-18',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

    }
}
