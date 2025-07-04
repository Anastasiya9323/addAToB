<?php

namespace SitemapGenerator;

use SitemapGenerator\Generators\CsvGenerator;
use SitemapGenerator\Generators\JsonGenerator;
use SitemapGenerator\Generators\XmlGenerator;
use SitemapGenerator\DirGenerator;

// по сути мы вызываем его а внутри уже указываем на то, какой тип генерации вызывать
class Generator
{
    private $csvGenerator;
    private $jsonGenerator;
    private $xmlGenerator;
    private $dirGenerator;


    public function __construct(
    ) {
        $this->csvGenerator = new CsvGenerator;
        $this->jsonGenerator = new JsonGenerator;
        $this->xmlGenerator = new XmlGenerator;
        $this->dirGenerator = new DirGenerator;
    }

    public function generate($inputArray, $typeOfSitemap, $pathToSave)
    {
        $this->dirGenerator->dirGenerate($pathToSave);

        if ($typeOfSitemap == 'csv') {
            $this->csvGenerator->generateSitemap($inputArray, $pathToSave);
        } elseif ($typeOfSitemap == 'json') {
            $this->jsonGenerator->generateSitemap($inputArray, $pathToSave);
        } elseif ($typeOfSitemap == 'xml') {
            $this->xmlGenerator->generateSitemap($inputArray, $pathToSave);
        } else {
        }
    }
}