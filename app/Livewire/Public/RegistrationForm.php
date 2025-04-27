<?php

namespace App\Livewire\Public;

use App\Models\Public\Forms\PostgraduateForm;
use App\Services\Academic\ProgramService;
use App\Services\Academic\RegistrationFormService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;
    public $code;
    public $program = null;

    public $form = [];
    public $readonly = false;
    public $foto = null;

    public function mount($code)
    {
        $this->program = ProgramService::getProgramByCode($code);
        if ($this->program == null) {
            session()->flash('error', 'El programa no existe.');
            return redirect()->route('public.formulario-inscripcion');
        }
        $this->code = $code;
        $this->form = PostgraduateForm::Inicializar();
        $this->form['programa_id'] = $this->program->id;
    }

    public function save()
    {
        if ($this->foto != null) {
            $this->validate(
                [
                    'foto' => 'required|image|mimes:png,jpeg|max:5120',
                ],
                [
                    'foto.required' => 'La foto es obligatoria.',
                    'foto.image' => 'El archivo debe ser una imagen.',
                    'foto.mimes' => 'La imagen debe ser de tipo png o jpeg.',
                    'foto.max' => 'La imagen no puede exceder los 5MB.',
                ]
            );
            $this->form["url_foto"] = $this->saveFile($this->foto, 'postgraduate_forms');
        } else {
            $this->form['url_foto'] = null;
        }
        $this->validate(PostgraduateForm::rules(), PostgraduateForm::messages());
        $new =  RegistrationFormService::create($this->form);

        if ($new == null) {
            session()->flash('error', 'Intente nuevamente o mas tarde.');
            return;
        }

        $this->readonly = true;
        $this->form = PostgraduateForm::Inicializar();
        $this->form['programa_id'] = $this->program->id;
        session()->flash('success', 'Formulario guardado correctamente.');
    }

    private function saveFile($file, $path)
    {
        return 'storage/' . Storage::disk('public')->put($path, $file);
    }

    public function render()
    {
        return view('livewire.public.registration-form')->layout('layouts.guest');;
    }
}
