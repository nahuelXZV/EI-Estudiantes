<?php

namespace App\Livewire\Public;

use App\Models\Public\Forms\PostgraduateForm;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioInscripcion extends Component
{
    use WithFileUploads;
    public $form = [];
    public $modoDescargar = false;
    public $readonly = false;
    public $formCifrado = null;
    public $foto = null;

    public function mount()
    {
        $this->form = PostgraduateForm::Inicializar();
    }

    public function save()
    {
        if ($this->foto != null) {
            // $codigo = Date::now()->format('YmdHis');
            $this->form["photo"] = $this->saveFile($this->foto, 'postgraduate_forms');
        } else {
            $this->form['photo'] = null;
        }
        $this->validate(PostgraduateForm::rules(), PostgraduateForm::messages());
        $this->modoDescargar = true;
        $this->readonly = true;
        $this->formCifrado = encrypt(json_encode($this->form));
        session()->flash('success', 'Puede descargar el formulario.');
    }

    private function saveFile($file, $path)
    {
        return 'storage/' . Storage::disk('public')->put($path, $file);
    }

    public function render()
    {
        return view('livewire.public.formulario-inscripcion')->layout('layouts.guest');
    }
}
