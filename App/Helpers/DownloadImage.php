<?php

declare(strict_types=1);

namespace App\Helpers;

trait DownloadImage
{
    public function downloadImage(string $url, string $parserName): string
    {
        $imageFolder = 'var/image/' . $parserName . '/';

        if (!file_exists($imageFolder)) {
            mkdir($imageFolder, 0777, true);
        }

        $file = $imageFolder . md5($url) . '.jpg';

        if (!file_exists($file)) {

            $result = file_get_contents($url);

            if (!$result) return '';

            file_put_contents($file, $result);

        }

        $file = str_replace('var/image/', '', $file);

        return 'catalog/' . $file;
    }
}