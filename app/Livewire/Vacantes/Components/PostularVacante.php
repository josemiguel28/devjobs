<?php

namespace App\Livewire\Vacantes\Components;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


class PostularVacante extends Component
{
    use WithFileUploads;

    #[Validate('required|mimes:pdf|max:1024')]
    public $cv;

    public $vacante;
    public $yaAplico;

    public function mount()
    {
        $this->yaAplico = $this->vacante->candidatos()
            ->where('user_id', auth()->id())
            ->exists();
    }

    public function postularse()
    {
        $this->validate();
        //almacenar el CV
        $cv = $this->cv->store(path: 'cv');
        $cvRuta = str_replace('cv/', '', $cv);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $cvRuta
        ]);

        //crear notificacion para el usuario que creo la vacante
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        session()->flash('message', 'Se envio correctamente tu postulación, ¡mucha suerte!');

        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.vacantes.components.postular-vacante', [
            'yaAplico' => $this->yaAplico
        ]);
    }
}
