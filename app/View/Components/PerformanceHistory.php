<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PerformanceHistory extends Component
{
    public $output;
    public $disclaimer;
    public $download;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->output = $this->compileData();
        $this->disclaimer = $this->getDisclaimer();
        $this->download = $this->download();
    }

    public function compileData()
    {
        $data = [
            'head' => ['1M', '3M', 'YTD', '1Y', '3Y', '5Y'],
            'body' => [
                'Lorem Ispum' => ['10%', '10%', '10%', '10%', '10%', '10%'],
            ],
        ];

        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('performance_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('performance_download');
        if (isset($res['url'])) {
            $res = $res['url'];
        } else {
            $res = '';
        }
        return $res;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data.performance-history');
    }
}
