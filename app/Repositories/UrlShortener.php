<?php

namespace App\Helpers;

class UrlShortener
{    
    
 	 /**
 	 * bit.ly api version
 	 * @var string
 	 */
     private $apiVersion = 'v3';

     /**
     * request format
     * @var string
     */
     private $format;

     /**
     * bit.ly api login key
     * @var string
     */
     private $login;

     /**
     * bit.ly api key
     * @var [type]
     */
     private $apiKey;


     /**
     * 
     * @param string $key 
     */
     public function setKey($key)
     {
        $this->apiKey = $key;
     }

     /**
     * 
     * @param string $login 
     */
     public function setLogin($login)
     {
        $this->login = $login;
     }

     /**
     * 
     * @param string $format
     */
     public function setFormat($format)

    {
        $this->format = $format;
    }

     /**
     * 
     * @param  string $url 
     * @return mixed
     */

     public function shortenUrl($url)
     {
        $encodedUrl    = urlencode($url);

        $bitlyUrl      = "http://api.bit.ly/shorten?version=".$this->apiVersion."&format=".$this->format."&longUrl=".$encodedUrl."&login=".$this->login."&apiKey=".$this->apiKey;


        $content       = file_get_contents($bitlyUrl);


        try {
            return $this->parseContent($content, $url);
        } catch (Exception $e) {
            return "Caught exception ". $e->getMessage().".";
        }

     }


     /**
     * 
     * @param  string $url 
     * @return string
     */
     private function parseUrl($url)
     {
        $parsedUrl        = parse_url($url);
        return trim($parsedUrl['path'], '/');
     }

     /**
     * 
     * @param  string $content 
     * @param  string $key
     * @return string
     */
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
