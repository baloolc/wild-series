<?php

namespace App\Service;

class Slugify
{
    pubilc function remove
    public function generate(string $str): string
    {
        return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
        array('', '-', ''), remove_accent($str)));
    }
    
}