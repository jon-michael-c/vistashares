<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class ETFPrices extends Component
{
    public $file = '.T5_DailyNAV_';
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
                "NAV" => [],
                "Market Price" => [],
            ],
        ];

        // Get the CSV file path from .env
        $csvFile = CSVHelper::getRecentFile($this->file);
        if (!file_exists($csvFile)) {
            return $data;
        }

        // Read the CSV file
        $readCSV = CSVHelper::readCSV($csvFile);
        // Find row by ticker
        // Uppercase the ticker to match the CSV file
        $ticker = strtoupper(get_the_title());
        $row = CSVHelper::findRowByTicker($ticker, $readCSV);


        array_push($data['body']['NAV'], $row['NAV']);
        array_push($data['body']['NAV'], '<span class="text-ultramarine font-medium">Daily Change</span>');
        array_push($data['body']['NAV'], $row['NAV Change Dollars']);
        array_push($data['body']['NAV'], $row['NAV Change Percentage'] . '%');
        array_push($data['body']['Market Price'], $row['Market Price']);
        array_push($data['body']['Market Price'], '<span class="text-ultramarine font-medium">Daily Change</span>');
        array_push($data['body']['Market Price'], $row['Market Price Change Dollars']);
        array_push($data['body']['Market Price'], $row['Market Price Change Percentage'] . '%');




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
            $res = $res['url']['url'];
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
        return view('components.data.e-t-f-prices');
    }
}
