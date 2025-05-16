<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image
{

    public static function getMediaUrl($item, $collection = '', $defaultImage = 'robot.png')
    {
        if (isset($item) && $item->getFirstMedia($collection) != null && File::exists($item->getFirstMedia($collection)->getPath())) {
            return $item->getFirstMediaUrl($collection);
        }

        return asset($defaultImage);
    }

}
