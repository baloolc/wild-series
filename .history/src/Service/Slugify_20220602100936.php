<?php

namespace App\Service;

class Slugify
{
    public function generate(string $str): string
    {
        return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
        array('', '-', ''), remove_accent($str)));
    }
    
}