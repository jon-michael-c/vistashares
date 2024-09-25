<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Download extends Component
{
    public $url;
    public $class;
    public $color;
    /**
     * Create a new component instance.
     */
    public function __construct($url = '', $class = '', $color = '#f2f2f2')
    {
        $this->url = $url;
        $this->class = $class;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.download');
    }
}
