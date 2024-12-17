<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Helpers\CSVHelper;


Route::get('/csv/top-holdings', function (Request $request) {
    $file = '.T5_ETF_Holdings_';
    $etf = $request->input('etf', 'ais');
    $csvFile = CSVHelper::getRecentFile($file);
    $date = date('Ymd', filemtime($csvFile));
    $readCSV = CSVHelper::readCSV($csvFile);
    $readCSV = CSVHelper::findRowsByTicker($etf, $readCSV, 'Account');

    array_multisort(array_column($readCSV, 'Weightings'), SORT_DESC, $readCSV);

    // Define the output CSV filename
    $outputFileName = $etf . '_top_holdings_sorted_' . $date . '.csv';

    // Set headers for CSV file download
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $outputFileName . '"',
    ];

    // Use response()->stream to output the sorted data as CSV
    return response()->stream(function () use ($readCSV) {
        $output = fopen('php://output', 'w');

        // Add headers (column names) to CSV if they exist
        if (!empty($readCSV)) {
            fputcsv($output, array_keys($readCSV[0])); // Add column headers
        }

        // Write sorted data rows to CSV
        foreach ($readCSV as $row) {
            fputcsv($output, $row);
        }

        fclose($output);
    }, 200, $headers);


});