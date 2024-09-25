<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ETFRisk extends Component
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
            'body' =>
                [
                    'ETF Name' => ['VistaShares ETF'],
                    'Ticker Symbol' => ['VST'],
                    'Total Assets' => ['$100,000,000'],
                    'Expense Ratio' => ['0.05%'],
                    'Inception Date' => ['01/01/2022'],
                ]
        ];

        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('etf_risk_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('etf_risk_download');
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
        return view('components.data.e-t-f-risk');
    }
}
