<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input): string
    {
        $input = preg_replace('~[^\pL\d]+~u', self::DIVIDER, $input);
        $input = iconv('utf-8', 'us-ascii//TRANSLIT', $input);
        $input = preg_replace('~[^-\w]+~', '', $input);

        // trim
        $input = trim($input, self::DIVIDER);

        // remove duplicate divider
        $input = preg_replace('~-+~', self::DIVIDER, $input);

        // lowercase
        $input = strtolower($input);

        if (empty($input)) {
            return 'n-a';
        }

        return $input;
    }
    }
}