<?php

declare(strict_types=1);

namespace App\Helpers;

trait GetHtmlTrait {

    public function getHtml(string $file): string
    {
        return file_get_contents($file);
    }
}

