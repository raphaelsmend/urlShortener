<?php

namespace App\Transformers;

use App\Models\Url;

class UrlTransformer
{
    static function transform(Url $url)
    {
        return [
            'url_shortened'  => $url->url_shortened
        ];
    }
}
