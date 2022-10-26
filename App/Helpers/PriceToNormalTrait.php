<?php

declare(strict_types=1);

namespace App\Helpers;

trait PriceToNormalTrait
{
    private function priceToNormalTrait(string $string): int
    {
        $string = htmlentities($string, encoding: 'utf-8');
        $content = str_replace(["&nbsp;", " ", " руб.", "руб.", "руб", "&nbsp;руб.", "&nbsp;руб"], "", $string);
        return (int)html_entity_decode($content);
    }
}