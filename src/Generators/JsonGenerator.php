<?php

namespace SitemapGenerator\Generators;

use SitemapGenerator\Interfaces\GenerateSitemapInterface;

class JsonGenerator implements GenerateSitemapInterface
{

    public function generateSitemap($inputArray, $pathToSave)
    {
        $result = json_encode($inputArray);

        $file = fopen($pathToSave, 'w');

        fputs($file, $result);

        fclose($file);
    }
}