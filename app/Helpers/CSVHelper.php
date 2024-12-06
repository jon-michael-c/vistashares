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

    public static function findRowByTicker($ticker, $readCSV, $col = 'Fund Ticker')
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
    public static function getRecentDate($csvFile)
    {
        // Get folder path and prefix from environment variables
        $folder = env('FEED_PATH');
        $prefix = env('FEED_PREFIX');

        // Validate that the folder exists
        if (!is_dir($folder)) {
            throw new \Exception("The specified folder does not exist: $folder");
        }

        // Scan the folder for files
        $files = scandir($folder);
        $dates = [];

        foreach ($files as $file) {
            // Build the full matching prefix
            $filePrefix = $prefix . $csvFile;

            // Check if the file name starts with the prefix and ends with '.csv'
            if (strpos($file, $filePrefix) === 0 && pathinfo($file, PATHINFO_EXTENSION) === 'csv') {
                // Extract potential date from the file name
                $datePart = str_replace([$filePrefix, '.csv'], '', $file);

                // Check if the extracted part matches a valid YYYYMMDD date
                if (preg_match('/^\d{8}$/', $datePart)) {
                    $dates[$datePart] = $file; // Map date to the file name
                }
            }
        }

        // Sort the dates in descending order
        if (!empty($dates)) {
            krsort($dates); // Sort keys (dates) in reverse order
            return reset($dates); // Return the file with the most recent date
        }

        // Handle case where no matching file is found
        throw new \Exception("No matching files found for prefix: $filePrefix");
    }

    public static function getRecentFile($csvFile)
    {
        return env('FEED_PATH') . self::getRecentDate($csvFile);
    }

    public static function getMostRecentDate($csvFile)
    {
        // Get folder path and prefix from environment variables
        $folder = env('FEED_PATH');
        $prefix = env('FEED_PREFIX');

        // Validate that the folder exists
        if (!is_dir($folder)) {
            throw new \Exception("The specified folder does not exist: $folder");
        }

        // Scan the folder for files
        $files = scandir($folder);
        $dates = [];

        foreach ($files as $file) {
            // Build the full matching prefix
            $filePrefix = $prefix . $csvFile;

            // Check if the file name starts with the prefix and ends with '.csv'
            if (strpos($file, $filePrefix) === 0 && pathinfo($file, PATHINFO_EXTENSION) === 'csv') {
                // Extract potential date from the file name
                $datePart = str_replace([$filePrefix, '.csv'], '', $file);

                // Check if the extracted part matches a valid YYYYMMDD date
                if (preg_match('/^\d{8}$/', $datePart)) {
                    $dates[] = $datePart;
                }
            }
        }

        // Sort the dates in descending order and return the most recent one
        if (!empty($dates)) {
            rsort($dates); // Sort dates in descending order

            // Return formatted date MM-DD-YYYY
            return date('m/d/Y', strtotime($dates[0]));
        } else {
            return '10/01/2024';
        }

        // Handle case where no valid date is found
        throw new \Exception("No matching files with valid dates found for prefix: $filePrefix");
    }


}
