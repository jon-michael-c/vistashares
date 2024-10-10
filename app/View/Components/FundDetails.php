<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FundDetails extends Component
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
                'Inception Date' => ['10/01/2024'],
                'Total Expense Ratio' => ['0.58%'],
                'Net Assets' => ['$100,000,000'],
                'NAV' => ['$50.25'],
                'Fact Sheet' => ['<a target="_blank" href="#"><span class="icon"></span></a>'],
            ],
        ];

        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('fund_details_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('fund_details_download');
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
        return view('components.data.fund-details');
    }
}
