<?php

declare(strict_types=1);

namespace App\Helpers;

trait LogTrait
{
    public function writeLog($variable, $filename)
    {
        file_put_contents($filename . '.txt', $variable . PHP_EOL, FILE_APPEND);
    }
}