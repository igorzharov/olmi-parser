<?php

declare(strict_types=1);

namespace App\Helpers;

trait LogTrait
{
    public function writeLog($variable, $filename)
    {
        file_put_contents($filename . '-' . date("Y-m-d_m-s") . '.txt', print_r($variable, true));
    }
}