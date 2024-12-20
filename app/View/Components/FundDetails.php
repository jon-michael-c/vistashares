<?php

namespace App\View\Components;

use App\Helpers\CSVHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FundDetails extends Component
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
                'Inception Date' => [],
                'Net Assets' => [],
                'NAV' => [],
                'Fact Sheet' => ['<a target="_blank" href="#"><span class="icon icon-download"></span></a>'],
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

        array_push($data['body']['Net Assets'], isset($row['Net Assets']) ? '$' . number_format($row['Net Assets'], 2) : '');
        array_push($data['body']['NAV'], $row['NAV'] ?? '');
        array_push($data['body']['Inception Date'], get_field('inception_date') ?? '10/01/2024');

        $fact_sheet = get_field('fact_sheet', get_the_ID());
        if ($fact_sheet) {
            $data['body']['Fact Sheet'] = ['<a target="_blank" href="' . $fact_sheet['url'] . '"><span class="icon icon-download"></span></a>'];
        }


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
        return view('components.data.fund-details');
    }
}
