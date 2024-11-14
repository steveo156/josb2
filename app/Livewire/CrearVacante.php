<?php

namespace App\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:12000',
    ];

    // Esta linea se utiliza para decirle a laravel que vamos a subir imagenes, de lo contrario dara error
    use WithFileUploads;

    public function crearVacante()
    {
        $datos = $this->validate();

        // Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');

        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        // Crear la vacante 
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'La vacante se publicó correctamente');

        // Redireccinar al usuario

        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        // Consultar BD

        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
