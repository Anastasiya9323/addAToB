<?php

namespace Experimentpackage;

class AddAToB
{
    protected $a;
    protected $b;

    public function _construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function add($a, $b)
    {
        return $a + $b;
    }
}