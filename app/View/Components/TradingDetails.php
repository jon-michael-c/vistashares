<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class TradingDetails extends Component
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
                'Ticker' => [],
                'Bloomberg Index Ticker' => [],
                'CUSIP' => [],
                'Primary Exchange' => [],
                'Shares Outstanding' => [],
                'Number of Holdings' => [],
                '30-Day Median Bid-Ask Spread' => [],

            ],
        ];

        $csvFile = CSVHelper::getRecentFile($this->file);
        if (!file_exists($csvFile)) {
            return $data;
        }

        $readCSV = CSVHelper::readCSV($csvFile);

        $ticker = strtoupper(get_the_title());
        $row = CSVHelper::findRowByTicker($ticker, $readCSV);
        if (!$row) {
            return $data;
        }

        array_push($data['body']['Ticker'], $row['Fund Ticker'] ?? '');
        array_push($data['body']['Bloomberg Index Ticker'], $row['Fund Ticker'] ?? '');
        array_push($data['body']['CUSIP'], $row['CUSIP'] ?? '');
        array_push($data['body']['ISIN'], $row['ISIN'] ?? 'N/A');
        array_push($data['body']['Primary Exchange'], $row['Primary Exchange'] ?? 'NYSE');
        array_push($data['body']['Shares Outstanding'], $row['Shares Outstanding'] ?? 'N/A');
        array_push($data['body']['Number of Holdings'], $row['Holdings'] ?? 'N/A');
        array_push($data['body']['30-Day Median Bid-Ask Spread'], ($row['Median 30 Day Spread Percentage'] ?? '0') . '%');


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
        return view('components.data.trading-details');
    }
}
