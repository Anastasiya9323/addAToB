<?php

namespace SitemapGenerator;

use SitemapGenerator\Generators\CsvGenerator;
use SitemapGenerator\Generators\JsonGenerator;
use SitemapGenerator\Generators\XmlGenerator;
use SitemapGenerator\DirGenerator;
use SitemapGenerator\Exceptions\InvalidFileTypeException;
use SitemapGenerator\Exceptions\IncorrectInputDataException;

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
        $this->validateInput($inputArray);

        $this->dirGenerator->dirGenerate($pathToSave);

        if ($typeOfSitemap == 'csv') {
            $this->csvGenerator->generateSitemap($inputArray, $pathToSave);
        } elseif ($typeOfSitemap == 'json') {
            $this->jsonGenerator->generateSitemap($inputArray, $pathToSave);
        } elseif ($typeOfSitemap == 'xml') {
            $this->xmlGenerator->generateSitemap($inputArray, $pathToSave);
        } else {
            throw new InvalidFileTypeException();
        }
    }

    private function validateInput($data)
    {
        foreach ($data as $row) {
            if (!isset($row['loc']) || !isset($row['lastmod']) || !isset($row['priority']) || !isset($row['changefreq'])) {
                throw new IncorrectInputDataException();
            }
        }
    }
}