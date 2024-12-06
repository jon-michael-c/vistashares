<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class Distributions extends Component
{

    public $file = '.T5_SECYield_';
    public $output;
    public $disclaimer;
    public $download;
    public $date;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->output = $this->compileData();
        $this->disclaimer = $this->getDisclaimer();
        $this->download = $this->download();
        $this->date = $this->getDate();
    }

    public function compileData()
    {
        $data = [
            'head' => [],
            'body' => [
                '30-Day SEC Yield' => ['0'],
                'Distribution Frequency' => ['Semi-Annually']
            ]
        ];

        // Get the CSV file path from .env
        try {
            $csvFile = CSVHelper::getRecentFile($this->file);
        } catch (\Exception $e) {

            return $data;
        }
        if (!file_exists($csvFile)) {
            return $data;
        }

        $readCSV = CSVHelper::readCSV($csvFile);
        $ticker = strtoupper(get_the_title());
        $row = CSVHelper::findRowByTicker($ticker, $readCSV);
        if (!$row) {
            return $data;
        }

        array_push($data['body']['30-Day SEC Yield'], $row['30-Day SEC Yield'] ?? '0');



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

    public function getDate()
    {
        $date = CSVHelper::getMostRecentDate($this->file);
        return $date;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data.distributions');
    }
}
