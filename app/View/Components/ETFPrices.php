<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ETFPrices extends Component
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
            'head' => [],
            'body' => [
                'NAV' => ['$35.87', '<span class="text-ultramarine font-medium">Daily Change</span>', '$0.10', '0.27%'],
                'Market Price' => [
                    '$40.58',
                    '<span class="text-ultramarine font-medium">Daily Change</span>',
                    '$0.11',
                    '-10%',
                ],
            ],
        ];

        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('etf_prices_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('etf_prices_download');
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
        return view('components.data.e-t-f-prices');
    }
}
