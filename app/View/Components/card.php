<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $fecha;
    public $hora;
    public $nameDoctor;
    public $description;

    public function __construct($fecha, $hora, $nameDoctor, $description)
    {
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->nameDoctor = $nameDoctor;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
