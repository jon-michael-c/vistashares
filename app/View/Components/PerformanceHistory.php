<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

class PerformanceHistory extends Component
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
            'head' => ['1M', '3M', 'YTD', '1Y', '3Y', '5Y'],
            'body' => [
            ],
        ];

        // Get the CSV file path from .env
        $csvFile = env('FEED_PATH') . env("FEED_PREFIX") . '.OJ_' . 'TICKER_MonthlyPerformance.csv';
        if (!file_exists($csvFile)) {
            return $data;
        }

        // Read the CSV file
        $readCSV = CSVHelper::readCSV($csvFile);
        // Find row by ticker
        $ticker = strtoupper(get_the_title());
        $row = CSVHelper::findRowByTicker($ticker, $readCSV);

        // Parse the CSV data
        // Extract the required data from the CSV
        foreach ($readCSV as $row) {
            $fundName = $row['Fund Name'];
            $fundTicker = $row['Fund Ticker'];
            $oneMonth = $row['1 Month'];
            $threeMonth = $row['3 Month'];
            $ytd = $row['YTD'];
            $oneYear = $row['1 Year'];
            $threeYear = $row['3 Year'];
            $fiveYear = $row['5 Year'];

            // Add the data to the $data array
            $data['body'][$fundName] = [
                $oneMonth . '%',
                $threeMonth . '%',
                $ytd . '%',
                $oneYear . '%',
                $threeYear . '%',
                $fiveYear . '%',
            ];
        }

        return $data;
    }



    public function getDisclaimer()
    {
        $res = get_field('performance_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('performance_download');
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
        return view('components.data.performance-history');
    }
}
