<?php
namespace SitemapGenerator;

use SitemapGenerator\Exceptions\IncorrectInputDataException;
use SitemapGenerator\Exceptions\IncorrectOutFileExtensionException;
use SitemapGenerator\Exceptions\InvalidFileTypeException;
use SitemapGenerator\Generators\CsvGenerator;
use SitemapGenerator\Generators\JsonGenerator;
use SitemapGenerator\Generators\XmlGenerator;

class Generator
{
    private $generator;

    public function generate($inputArray, $typeOfSitemap, $pathToSave)
    {
        $this->validateInput($inputArray);

        $this->validateOutFileExtension($typeOfSitemap, $pathToSave);

        $this->generateDirectory($pathToSave);

        if ($typeOfSitemap === 'csv') {
            $this->generator = new CsvGenerator();
        } elseif ($typeOfSitemap === 'json') {
            $this->generator = new JsonGenerator();
        } elseif ($typeOfSitemap === 'xml') {
            $this->generator = new XmlGenerator();
        } else {
            throw new InvalidFileTypeException();
        }

        $this->generator->generateSitemap($inputArray, $pathToSave);
    }

    private function validateInput($data)
    {
        foreach ($data as $row) {
            if (! isset($row['loc']) || ! isset($row['lastmod']) || ! isset($row['priority']) || ! isset($row['changefreq'])) {
                throw new IncorrectInputDataException();
            }
        }
    }

    private function validateOutFileExtension($typeOfSitemap, $pathToSave)
    {
        if ($typeOfSitemap != pathinfo($pathToSave, PATHINFO_EXTENSION)) {
            throw new IncorrectOutFileExtensionException();
        }
    }

    private function generateDirectory($directory)
    {
        $newDirectory = pathinfo($directory, PATHINFO_DIRNAME);

        if (! is_dir($newDirectory)) {
            mkdir($newDirectory, 0777, true);
        }
    }
}
