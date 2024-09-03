<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $title;
    public $output;
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($title = '', $output = [], $type = 'default')
    {
        $this->title = $title;
        $this->output = count($output) != 0 ? $output : $this->sampleOutput();
        $this->type = $type;
    }

    private function sampleOutput()
    {
        return [
            'head' => [],
            'body' =>
                [
                    'ETF Name' => ['VistaShares ETF'],
                    'Ticker Symbol' => ['VST'],
                    'Total Assets' => ['$100,000,000'],
                    'Expense Ratio' => ['0.05%'],
                    'Inception Date' => ['01/01/2022'],
                ]

        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data.table');
    }
}
