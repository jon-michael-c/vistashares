<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Helpers\CSVHelper;

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
            '#cdaee5',
            '#93a0c2'

        ];
        $this->output = $this->compileData();
        $this->disclaimer = $this->getDisclaimer();
        $this->download = $this->download();


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
        $file = get_field('exposure_data');
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
            'http' => [
                'header' => "Authorization: Basic " . base64_encode("viewer:{JQbfe!y(D8")
            ]
        ]);
        if (!isset($file['url'])) {
            return [];
        }
        $file_content = file_get_contents($file['url'], false, $context);
        if ($file_content !== false) {
            $csv_rows = array_map('str_getcsv', explode("\n", $file_content));

            $headers = $csv_rows[0];
            unset($csv_rows[0]);

            $data = [];
            foreach ($csv_rows as $row) {
                if (!empty($row)) {
                    $data[] = array_combine($headers, $row);
                }
            }
        }

        $res = [];
        foreach ($data as $index => $item) {
            $res[] = [
                'name' => $item['Sector'],
                'y' => floatval(str_replace('%', '', $item['Weight'])),
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
