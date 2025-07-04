<?php
namespace SitemapGenerator\Generators;

use SitemapGenerator\Interfaces\GenerateSitemapInterface;
use XMLWriter;

class XmlGenerator implements GenerateSitemapInterface
{
    public function generateSitemap($inputArray, $pathToSave)
    {
        $xml = new XMLWriter();
        $xml->openUri($pathToSave);
        $xml->startDocument('1.0', 'utf-8');
        $xml->startElement('urlset');

        foreach ($inputArray as $value) {
            $xml->startElement('url');

            foreach ($value as $key => $val) {
                $xml->writeElement($key, $val);
            }

            $xml->endElement();
        }

        $xml->endElement();
    }
}
