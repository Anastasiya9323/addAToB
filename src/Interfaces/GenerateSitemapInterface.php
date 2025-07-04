<?php
namespace SitemapGenerator\Interfaces;

interface GenerateSitemapInterface
{
    public function generateSitemap($inputArray, $pathToSave);
}
