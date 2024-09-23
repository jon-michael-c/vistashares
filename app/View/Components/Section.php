<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{

    public $class;
    public $id;
    public $bg_image;
    /**
     * Create a new component instance.
     */
    public function __construct($class = '', $id = '', $bg_image = null)
    {
        $this->class = $class;
        $this->id = $id;
        $this->bg_image = $bg_image;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section');
    }
}
