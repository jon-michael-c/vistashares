<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class TopHoldings extends Component
{
    public $file = '.T5_ETF_Holdings_';
    public $output;
    public $disclaimer;
    public $download;
    public $date = '10/01/2024';
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
            'head' => ['CUSIP', 'Shares', 'Price', 'Market Value', 'Weightings'],
            'body' => [],
        ];

        // Get the CSV file path from .env
        $csvFile = CSVHelper::getRecentFile($this->file);
        if (!file_exists($csvFile)) {
            dd('File not found: ' . $csvFile);
            return $data;
        }

        // Read the CSV file
        $readCSV = CSVHelper::readCSV($csvFile);

        // Find row by ticker
        $ticker = strtoupper(get_the_title());
        $rows = CSVHelper::findRowsByTicker($ticker, $readCSV, 'Account');
        $rows = $this->sortData($rows);

        foreach ($rows as $row) {
            $CUSIP = $row['CUSIP'];
            $Shares = number_format($row['Shares'], 0);
            $Price = '$' . number_format($row['Price'], 2);
            $MarketValue = '$' . number_format($row['MarketValue'], 2);
            $Weightings = $row['Weightings'];
            $SecurityName = $row['SecurityName'];

            $data['body'][$SecurityName] = [
                $CUSIP,
                $Shares,
                $Price,
                $MarketValue,
                $Weightings,
            ];


        }

        $this->date = $rows[0]['Date'];

        // Get the the top 10 holdings
        $data['body'] = array_slice($data['body'], 0, 10);


        return $data;
    }

    public function getDisclaimer()
    {
        $res = get_field('top_holdings_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('top_holdings_download');
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

    private function sortData($data)
    {
        // Sort by Weightings
        $res = [];
        foreach ($data as $key => $row) {
            $res[$key] = $row['Weightings'];
        }
        array_multisort($res, SORT_DESC, $data);

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data.top-holdings');
    }
}
