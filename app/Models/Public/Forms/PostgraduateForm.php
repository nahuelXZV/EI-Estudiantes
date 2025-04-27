<?php

namespace App\Models\Public\Forms;

use Illuminate\Database\Eloquent\Model;

class PostgraduateForm extends Model
{
    public static function rules()
    {
        return [
            'form.nombre_completo' => 'required|string|max:255',
            'form.genero' => 'required|string',
            'form.es_boliviano' => 'required|boolean',
            'form.ci' => 'string|max:255',
            'form.ci_expedido' => 'string|max:255',
            'form.telefono' => 'string|max:255',
            'form.pasaporte' => 'nullable|string|max:255',
            'form.whatsapp' => 'required|string|max:15',
            'form.email' => 'required|email|max:255',
            'form.profesion' => 'required|string|max:255',
            'form.universidad_origen' => 'required|string|max:255',
            'form.anio_egreso' => 'required|integer',
            'form.registro_uagrm' => 'nullable|string|max:255',
            'form.institucion_trabajo' => 'required|string|max:255',
            'form.url_foto' => 'required|string',
            'form.experiencia_laboral' => 'required|string',
        ];
    }

    public static function messages()
    {
        return [
            'form.nombre_completo.required' => 'El nombre completo es obligatorio.',
            'form.genero.required' => 'Debe seleccionar un género.',
            'form.es_boliviano.required' => 'Debe indicar si es boliviano o no.',
            'form.ci.required' => 'El carnet de identidad es obligatorio.',
            'form.ci_expedido.required' => 'Debe completar la expedición del CI.',
            'form.telefono.required' => 'El teléfono es obligatorio.',
            'form.whatsapp.required' => 'Debe ingresar su número de WhatsApp.',
            'form.whatsapp.max' => 'El número de WhatsApp no debe superar los 15 caracteres.',
            'form.email.required' => 'El correo electrónico es obligatorio.',
            'form.email.email' => 'Debe ingresar un correo electrónico válido.',
            'form.profesion.required' => 'Debe ingresar su profesión.',
            'form.universidad_origen.required' => 'Debe ingresar su universidad de origen.',
            'form.anio_egreso.required' => 'Debe ingresar su año de egreso.',
            'form.anio_egreso.integer' => 'El año de egreso debe ser un número.',
            'form.url_foto.required' => 'Debe subir una foto.',
            'form.experiencia_laboral.required' => 'Debe describir su experiencia laboral.',
            'form.institucion_trabajo.required' => 'Debe ingresar la institución donde trabaja.',
        ];
    }

    public static function Inicializar()
    {
        return [
            'programa_id' => 0,
            'nombre_completo' => "",
            'genero' => "",
            'es_boliviano' => true,
            'ci' => "",
            'ci_expedido' => "",
            'telefono' => "",
            'pasaporte' => "",
            'whatsapp' => "",
            'email' => "",
            'profesion' => "",
            'universidad_origen' => "",
            'anio_egreso' => 0,
            'registro_uagrm' => "",
            'institucion_trabajo' => "",
            'url_foto' => "",
            'experiencia_laboral' => "",
        ];
    }
}
