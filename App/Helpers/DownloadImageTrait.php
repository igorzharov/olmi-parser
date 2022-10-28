<?php

declare(strict_types=1);

namespace App\Helpers;

trait DownloadImageTrait
{
    public function downloadImage(string $url, string $parserName): string
    {
        $imageFolder = 'var/image/' . $parserName . '/';

        if (!file_exists($imageFolder)) {
            mkdir($imageFolder, 0777, true);
        }

        $file = $imageFolder . md5($url) . '.jpg';

        if (file_exists($file)) {
            return $this->replacePath($file);
        }

        try {
            $result = file_get_contents($url);
        } catch (\Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;

            return '';
        }

        file_put_contents($file, $result);

        return $this->replacePath($file);
    }

    private function replacePath(string $file): string
    {
        $file = str_replace('var/image/', '', $file);

        return 'catalog/' . $file;
    }
}