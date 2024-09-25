<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Exposure extends Component
{

    public $output;
    public $colors;
    public $disclaimer;
    public $download;

    /**
     * Create a new component instance.
     */
    public function __construct($output = [], $colors = [])
    {
        //
        $this->colors = [
            '#0E062D',
            '#3E2BA5',
            '#B269FF',
            '#9990ca',
            '#7DA2FF',
            '#9550FC',
            '#87a5f0',
            '#c5d4fb',
            '#9fc0f3',
            '#9c94bc',

        ];
        $this->output = $this->compileData();
        $this->disclaimer = $this->getDisclaimer();
        $this->download = $this->download();


    }
    private function readCSV($csvFile, $delimiter = ",")
    {
        $file_handle = fopen($csvFile, 'r');
        $line_of_text = [];
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 1024, $delimiter);
        }
        fclose($file_handle);
        $filtered = array_filter($line_of_text); // Filter out any empty lines
        $header = array_shift($filtered); // Remove the header
        $res = [];

        foreach ($filtered as $key => $value) {
            $res[] = array_combine($header, $value);
        }

        return $res;
    }

    private function formatData($arr)
    {
        // Sort the array by the 'Weightings' key in reverse order
        usort($arr, function ($a, $b) {
            return $b['Weightings'] <=> $a['Weightings'];
        });

    }


    private function compileData()
    {
        $data = $this->readCSV(get_theme_root() . '/' . get_template() . '/resources/data/TidalETF_Services.40ZZ.JO_Holdings_05082023.csv', ',');
        $this->formatData($data);

        $res = [];
        foreach ($data as $index => $item) {
            $res[] = [
                'name' => $item['SecurityName'],
                'y' => floatval(str_replace('%', '', $item['Weightings'])),
                'color' => $this->colors[$index % count($this->colors)],
            ];
        }

        return $res;

    }


    public function getDisclaimer()
    {
        $res = get_field('exposure_disclaimer');
        return $res;
    }

    public function download()
    {
        $res = get_field('exposure_download');
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
        return view('components.data.exposure');
    }
}
