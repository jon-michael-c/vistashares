<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class TopHoldings extends Component
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
            'head' => ['CUSIP', 'Shares', 'Price', 'Market Value', 'Weightings'],
            'body' => [],
        ];

        // Get the CSV file path from .env
        $csvFile = env('FEED_PATH') . '/TidalETF_Services.40ZZ.JO_Holdings_05082023.csv';
        if (!file_exists($csvFile)) {
            return $data;
        }

        // Read the CSV file
        $readCSV = CSVHelper::readCSV($csvFile);

        // Find row by ticker
        $rows = CSVHelper::findRowsByTicker(get_the_title(), $readCSV, 'Account');

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

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data.top-holdings');
    }
}
