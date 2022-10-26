<?php

declare(strict_types=1);

namespace App\Helpers;

trait DownloadHtmlTrait
{
    use CurlTrait;

    public function downloadHtml(string $url, string $foldername) : string
    {
        $cacheFolder = 'var/cache/' . (new \ReflectionClass(get_called_class()))->getShortName() . '/' . $foldername . '/';

        if (!file_exists($cacheFolder)) {
            mkdir($cacheFolder, 0777, true);
        }

        $file = $cacheFolder . md5($url) . '.html';

        if (file_exists($file)) {
            return $file;
        }

        $html = $this->curl($url);

        file_put_contents($file, $html);

        return $file;
    }

}