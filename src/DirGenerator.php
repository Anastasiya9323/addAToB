<?php

namespace SitemapGenerator;

class DirGenerator
{
    public function dirGenerate($pathToSave)
    {
        if (is_dir(substr($pathToSave, 0, strpos($pathToSave, "/") + 1)) == false) {
            mkdir(substr($pathToSave, 0, strpos($pathToSave, "/") + 1), 0, true);
        }
    }
}