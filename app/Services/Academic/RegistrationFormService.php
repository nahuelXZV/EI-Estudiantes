<?php

namespace App\Services\Academic;

use App\Models\RegistrationForm;

class RegistrationFormService
{
    public function __construct() {}

    static public function getAllPaginateByProgram($program_id)
    {
        $inscriptions = RegistrationForm::where('programa_id', $program_id)->paginate(5, pageName: 'registrationPage');
        return $inscriptions;
    }

    static  public function getOne($id)
    {
        $inscription = RegistrationForm::find($id);
        return $inscription;
    }

    static public function create($data)
    {
        try {
            $new = RegistrationForm::create($data);
            return $new;
        } catch (\Throwable $th) {
            return false;
        }
    }


    static public function update($data)
    {
        try {
            $inscription = RegistrationForm::find($data['id']);
            // $inscription->estudiante_id = $data['estudiante_id'] ||
            $inscription->save();
            return $inscription;
        } catch (\Throwable $th) {
            return false;
        }
    }


    static  public function delete($id)
    {
        try {
            $inscription = RegistrationForm::find($id);
            $inscription->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
};
