<?php

namespace App\Models\Public\Forms;

use Illuminate\Database\Eloquent\Model;

class PostgraduateForm extends Model
{
    public static function rules()
    {
        return [
            'form.program' => 'required',
            'form.fullName' => 'required|string|max:255',
            'form.gender' => 'required|string',
            'form.isBolivian' => 'required|boolean',
            'form.ci' => 'required|string|max:255',
            'form.exp' => 'required|string|max:255',
            'form.whatsapp' => 'required|string|max:15',
            'form.email' => 'required|email|max:255',
            'form.profession' => 'required|string|max:255',
            'form.university' => 'required|string|max:255',
            'form.graduationYear' => 'required|integer',
            'form.photo' => 'required|string',
            'form.workExperience' => 'required|string',
        ];
    }

    // Método para los mensajes de error personalizados
    public static function messages()
    {
        return [
            'form.program.required' => 'El programa es obligatorio.',
            'form.fullName.required' => 'El nombre completo es obligatorio.',
            'form.gender.required' => 'Debe seleccionar un género.',
            'form.isBolivian.required' => 'Debe indicar si es boliviano o no.',
            'form.ci.required' => 'El carnet de identidad es obligatorio.',
            'form.exp.required' => 'Debe completar la expedición del CI.',
            'form.whatsapp.required' => 'Debe ingresar su número de WhatsApp.',
            'form.email.required' => 'El correo electrónico es obligatorio.',
            'form.email.email' => 'Debe ingresar un correo electrónico válido.',
            'form.profession.required' => 'Debe ingresar su profesión.',
            'form.university.required' => 'Debe ingresar su universidad de origen.',
            'form.graduationYear.required' => 'Debe ingresar su año de egreso.',
            'form.graduationYear.integer' => 'El año de egreso debe ser un número.',
            'form.photo.required' => 'Debe subir una foto.',
            'form.workExperience.required' => 'Debe describir su experiencia laboral.',
        ];
    }

    // Método para convertir el modelo a un array para la validación
    public static function Inicializar()
    {
        return [
            'program' => 0,
            'fullName' => "",
            'gender' => "",
            'isBolivian' => false,
            'ci' => "",
            'exp' => "",
            'whatsapp' => "",
            'email' => "",
            'profession' => "",
            'university' => "",
            'graduationYear' => 0,
            'photo' => "",
            'workExperience' => "",
        ];
    }
}
