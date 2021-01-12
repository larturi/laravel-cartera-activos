<?php

namespace App\Http\Requests;

// @author: Leandro Arturi (u57322)

use Illuminate\Foundation\Http\FormRequest;

class SistemaPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'                     => 'required|min:3|max:30',
            'sigla'                      => 'required|min:3|max:6',
            'descripcion'                => 'required|min:20|max:1000',
            'lider_id'                   => 'required',
            'criticidad_id'              => 'required',
            'justificacion_criticidad'   => 'nullable',
            'authentication_id'          => 'required',
            'estado_id'                  => 'required',
            'cliente_id'                 => 'required',
            'intranet'                   => 'nullable',
            'internet'                   => 'nullable',
            'f_produccion'               => 'nullable|date',
            'cliente_info'               => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'                   => 'El campo "nombre" es obligatorio.',
            'sigla.required'                    => 'El campo "sigla" es obligatorio.',
            'descripcion.required'              => 'El campo "descripción" es obligatorio.',
            'lider_id.required'                 => 'El campo "líder" es obligatorio.',
            'criticidad.required'               => 'El campo "criticidad" es obligatorio.',
            'authentication_id.required'        => 'El campo "tipo de autenticación" es obligatorio.',
            'estado_id.required'                => 'El campo "estado" es obligatorio.',
            'cliente_id.required'               => 'El campo "área solicitante" es obligatorio.',
            'f_produccion.required'             => 'El campo "fecha de implementación" es obligatorio.',
        ];
    }
}
