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
    public $date;

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
        $this->date = get_field('exposure_date');


    }

    private function formatData($arr)
    {

        $result = [];
        foreach ($arr as $item) {
            $type = $item['Type'] ?? 'unknown';
            if (!isset($result[$type])) {
                $result[$type] = [];
            }
            $result[$type][] = $item;
        }

        $iterableResult = [];
        foreach ($result as $type => $items) {
            $iterableResult[] = [
                'type' => $type,
                'items' => $items
            ];
        }

        foreach ($iterableResult as &$group) {
            foreach ($group['items'] as $index => &$item) {
                $item = [
                    'name' => $item['Name'],
                    'y' => floatval(str_replace('%', '', $item['Weight'])),
                    'color' => $this->colors[$index % count($this->colors)],
                ];
            }
        }

        // Sort by weight
        usort($iterableResult, function ($a, $b) {
            $weightA = $a['items'][0]['y'];
            $weightB = $b['items'][0]['y'];
            return $weightA <=> $weightB;
        });




        return $iterableResult;
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

        /*
        $res = [];
        foreach ($data as $index => $item) {
            $res[] = [
                'name' => $item['Sector'],
                'y' => floatval(str_replace('%', '', $item['Weight'])),
                'color' => $this->colors[$index % count($this->colors)],
            ];
        }
        */

        // Convert the CSV data to an array
        $data = CSVHelper::parseCSVString($file_content);
        $formatted = $this->formatData($data);
        $res = $formatted;


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
