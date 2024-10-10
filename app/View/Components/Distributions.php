<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class Distributions extends Component
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
            'body' => []
        ];

        // Get the CSV file path from .env
        $csvFile = env('FEED_PATH') . '/TidalETF_Services.40ZZ.Tidal_SECYield.csv';
        if (!file_exists($csvFile)) {
            return $data;
        }

        $readCSV = CSVHelper::readCSV($csvFile);
        $row = CSVHelper::findRowByTicker(get_the_title(), $readCSV);
        if (!$row) {
            return $data;
        }

        $SECYield = ['30-Day SEC Yield' => [$row['30-Day SEC Yield'] . '%']];

        // Merge SECYield with the existing $data['body'] array
        $data['body'] = array_merge($data['body'], $SECYield);
        $frequency = ['Distribution Frequency' => ['Semi-Annually']];
        $data['body'] = array_merge($data['body'], $frequency);




        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('distributions_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('distributions_download');
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
        return view('components.data.distributions');
    }
}
