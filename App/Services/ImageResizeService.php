<?php

namespace App\Services;

class ImageResizeService
{
    public function resize($width, $height)
    {
        $filename = '';

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $image_new = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . '.' . $extension;
    }
}