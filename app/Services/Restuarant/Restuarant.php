<?php

namespace App\Services\Restuarant;

use App\Services\Interfaces\RestuarantInterface;
use App\Services\Traits\CallCurl;
use Illuminate\Support\Facades\Cache;

class Restuarant implements RestuarantInterface
{
    use CallCurl;

    public $curl;

    const CURL_METHOD = 'GET';

    const QUERY_OBJECT_TYPE = 'restaurants';
    const QUERY_REGION = 'thailand';

    public $directionUrl;

    public $reponse;

    public $cacheName;

    public function setUrlDirection(string $targetLocation)
    {
        $this->targetLocation = $targetLocation;

        /** BUILD URL PARAM. */
        $queryParam = [
            'query' => self::QUERY_OBJECT_TYPE . ' ' . $this->targetLocation . ' ' . self::QUERY_REGION,
            'key' => env('GOOGLE_MAP_API_KEY'),
        ];
        $this->directionUrl = "https://maps.googleapis.com/maps/api/place/textsearch/json?" . http_build_query($queryParam);

        return $this;
    }

    public function excuse()
    {
        /** Check Cache: Search Result before excute. */
        $this->cacheName = CacheNameFormat($this->targetLocation);

        /** if Cache is Present. */
        if (Cache::has($this->cacheName)) {
            $this->reponse = Cache::get($this->cacheName);
            return $this;
        }

        /** if Cache is not present, then Excute. */
        $this->curl = $this->setUrl($this->directionUrl)
            ->setMethod(self::CURL_METHOD)
            ->call();
        $this->reponse = $this->curl->getCurlResponse();
        
        /** Store Data into Cache */
        Cache::put($this->cacheName, $this->reponse);

        return $this;
    }

    public function getResponse()
    {
        return $this->reponse;
    }
}
