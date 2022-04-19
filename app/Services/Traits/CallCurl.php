<?php

namespace App\Services\Traits;

trait CallCurl
{
    public $url;
    public $method;

    public $response;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function call(
        ?mixed $param = null
    ): self
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $this->response = $response;

        return $this;
    }

    public function getCurlResponse(bool $boolean = false)
    {
        if ($boolean) return $this->response;
        return json_decode($this->response, true);
    }
}
