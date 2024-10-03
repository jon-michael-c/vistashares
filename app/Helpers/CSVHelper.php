<?php

namespace App\Helpers;

class CSVHelper
{
    public static function readCSV($csvFile, $delimiter = ',')
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

    public static function parseCSVString($csvString, $delimiter = ',')
    {
        $lines = explode("\n", $csvString);
        $res = [];
        $header = str_getcsv(array_shift($lines), $delimiter);
        foreach ($lines as $line) {
            $data = str_getcsv($line, $delimiter);
            if (count($header) === count($data)) {
                $res[] = array_combine($header, $data);
            }
        }
        return $res;
    }

    public static function findRowByTicker($ticker, $readCSV, $col = 'Fund Name')
    {
        // Find row by ticker
        $row = array_filter($readCSV, function ($item) use ($ticker, $col) {
            return $item[$col] === $ticker;
        });
        $row = array_shift($row);
        return $row;
    }

    public static function findRowsByTicker($ticker, $readCSV, $col = 'Fund Name')
    {
        // Find every row by ticker
        $rows = array_filter($readCSV, function ($item) use ($ticker, $col) {
            return $item[$col] === $ticker;
        });
        return $rows;
    }

}
