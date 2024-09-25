<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TradingDetails extends Component
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
                'Ticker' => ['VST100'],
                'CUSIP' => ['123456789'],
                'Exchange' => ['NYSE'],
                'Bloomberg IOPV Ticker' => ['VST100IV'],
                'Index Ticker' => ['VST100TR'],
            ],
        ];

        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('trading_details_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('trading_details_download');
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
        return view('components.data.trading-details');
    }
}
