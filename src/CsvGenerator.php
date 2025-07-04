<?php

// TODO должен реализовать интерфейс
namespace SitemapGenerator;

use SitemapGenerator\Interfaces\GenerateSitemapInterface;

class CsvGenerator implements GenerateSitemapInterface
{

    public function generateSitemap($inputArray, $pathToSave)
    {
        $file = fopen($pathToSave, 'w');

        $header = false;
        foreach ($inputArray as $row) {
            if (empty($header)) {
                $header = array_keys($row);
                fputcsv($file, $header, ';');
                $header = array_flip($header);
            }
            fputcsv($file, array_merge($header, $row), ';');
        }

        fclose($file);
    }
}