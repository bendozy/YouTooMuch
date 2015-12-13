<?php

namespace App\Helpers;

class UrlShortener
{
    private $apiVersion = 'v3';


    private $format;


    private $login;

    private $apiKey;


    public function setKey($key)
    {
        $this->apiKey = $key;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }


    public function shortenUrl($url)
    {
        $encodedUrl    = urlencode($url);

        $bitlyUrl        = "http://api.bit.ly/shorten?version=".$this->apiVersion."&format=".$this->format."&longUrl=".$encodedUrl."&login=".$this->login."&apiKey=".$this->apiKey;

        $content        = file_get_contents($bitlyUrl);

        try {
            return $this->parseContent($content, $url);
        } catch (Exception $e) {
            return "Caught exception ". $e->getMessage().".";
        }
    }


    private function parseUrl($url)
    {
        $parsedUrl        = parse_url($url);
        return trim($parsedUrl['path'], '/');
    }


    public function parseContent($content, $key)
    {
        $content    = json_decode($content, true);

        if ($content['statusCode'] != 'OK') {
            return $content['statusCode'].":".$content['errorCode'].": ".$content['errorMessage'];
        }

        $shortUrl    = $content['results'][$key]['shortUrl'];
        return (isset($shortUrl))? $shortUrl : "Error: Url not found ".$key;
    }
}
