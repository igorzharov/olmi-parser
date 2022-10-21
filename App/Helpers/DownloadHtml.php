<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Entity\AEntity;

trait DownloadHtml
{
    use Curl;

    public function downloadHtml(AEntity $entity) : string
    {
        $cacheFolder = 'var/cache/' . $entity->getParserClassName() . '/' . $entity->getType() . '/';

        if (!file_exists($cacheFolder)) {
            mkdir($cacheFolder, 0777, true);
        }

        $file = $cacheFolder . md5($entity->getUrl()) . '.html';

        if (file_exists($file)) {
            return file_get_contents($file);
        }

        $html = $this->curl($entity->getUrl());

        file_put_contents($file, $html);

        return $html;
    }

}