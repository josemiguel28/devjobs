<?php

namespace App\Livewire\Vacantes\Components;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

/**
 * FiltrarVacantes
 * Se encarga de filtrar las vacantes según los criterios de búsqueda
 * especificados por el usuario.
 *
 * @package App\Livewire\Vacantes\Components
 */
class FiltrarVacantes extends Component
{

    public $termino;
    public $salario;
    public $categoria;


    public function leerDatosFormulario()
    {
        $this->dispatch('terminosBusqueda', $this->termino, $this->salario, $this->categoria);
    }

    public function render()
    {
        $salarios = Salario::select('id', 'salario')->get();
        $categorias = Categoria::select('id', 'categoria')->get();
        return view(
            'livewire.vacantes.components.filtrar-vacantes',
            [
                'salarios' => $salarios,
                'categorias' => $categorias
            ]
        );
    }
}
