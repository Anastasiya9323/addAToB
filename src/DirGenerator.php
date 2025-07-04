<?php

namespace SitemapGenerator;

class DirGenerator
{
    public function dirGenerate($pathToSave)
    {
        if (is_dir(str_replace(substr($pathToSave, -strpos(strrev($pathToSave), '/')), '', $pathToSave)) == false) {
            mkdir(str_replace(substr($pathToSave, -strpos(strrev($pathToSave), '/')), '', $pathToSave), 0777, true);
        }
    }
}