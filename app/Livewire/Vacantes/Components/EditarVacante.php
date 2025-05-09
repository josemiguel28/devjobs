<?php

namespace App\Livewire\Vacantes\Components;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    Use WithFileUploads;

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    //validacion de los campos en el formulario
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required|int',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024'
    ];

    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){
        $formData = $this->validate();

        if($this->imagen_nueva){
            //almacenar la imagen
            $imagen = $this->imagen_nueva->store(path: 'vacantes');
            $formData['imagen'] = str_replace('vacantes/', '', $imagen);
            Storage::delete('vacantes' . $this->imagen);
        }
        Vacante::where('id', $this->vacante_id)->update([
            'titulo' => $formData['titulo'],
            'salario_id' => $formData['salario'],
            'categoria_id' => $formData['categoria'],
            'imagen' => $formData['imagen'] ?? $this->imagen,
            'empresa' => $formData['empresa'],
            'ultimo_dia' => $formData['ultimo_dia'],
            'descripcion' => $formData['descripcion'],
        ]);

        session()->flash('success', 'La vacante se actualizó correctamente.');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::select('id','salario')->get();
        $categorias = Categoria::select('id', 'categoria')->get();

        return view('livewire.vacantes.components.editar-vacante',
        [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
