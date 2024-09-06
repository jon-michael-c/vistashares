<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Exposure extends Component
{

    public $output;
    public $colors;

    /**
     * Create a new component instance.
     */
    public function __construct($output = [], $colors = [])
    {
        //
        $this->colors = [
            '#0E062D',
            '#3E2BA5',
            '#B269FF',
            '#988ecb',
            '#7DA2FF',
            '#9550FC'

        ];
        $this->output = $this->compileData();

    }

    private function compileData()
    {
        $data =
            [
                [
                    'name' => 'Lorem Ispum',
                    'y' => 17.0,
                ],
                [
                    'name' => 'Loreum Ispum',
                    'y' => 15.2,
                ],
                [
                    'name' => 'Lorem Ispum',
                    'y' => 15.1,
                ],
                [
                    'name' => 'Lorem Ispum',
                    'y' => 14.9,
                ],
                [
                    'name' => 'Lreo Ispum',
                    'y' => 12.0,
                ],
                [
                    'name' => 'Lorem Ispsum',
                    'y' => 5.5,
                ],
            ];

        $res = [];
        foreach ($data as $index => $item) {
            $res[] = [
                'name' => $item['name'],
                'y' => $item['y'],
                'color' => $this->colors[$index % count($this->colors)],
            ];
        }

        return $res;

    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.exposure');
    }
}
