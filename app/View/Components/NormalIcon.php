<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NormalIcon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $feedback;

    public function __construct($feedback = '')
    {
        $this->feedback = $feedback;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.normal-icon');
    }
}
