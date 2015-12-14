<?php

namespace App\Helpers;

class UploadImage
{
    /**
     * UrlShortener object reference
     * @var UrlShortener
     */
    private $shortener;

<<<<<<< HEAD
    /**
     * Uploader object reference.
     * @var Uploader
     */
    private $uploader;

    /**
     * Shortened url of uploaded file
     * @var string
     */
    private $shortUrl;

    /**
     * Initialise the object
     * @param Uploader     $uploader  
     * @param UrlShortener $shortener 
     */
    public function __construct(Uploader $uploader, UrlShortener $shortener)
    {
        $this->shortener    = $shortener;
        $this->uploader    = $uploader;
    }

    /**
     * Initialise bitly url shortenin service configs
     * @return [type] [description]
     */
    public function intConfig()
    {
        $this->shortener->setLogin(env('BITLY_LOGIN'));
        $this->shortener->setKey(env('BITLY_API_KEY'));
        $this->shortener->setFormat('json');
    }

    /**
     * Upload image to cloudinary and return the shortened url
     * @param  Image $image 
     * @return string        shortened url
     */
    public function upload($image)
    {
        $this->intConfig();

        if (! is_null($image)) {
            $result    = $this->uploader->upload($image);
            $longUrl    = $result['url'];
            $this->shortUrl =   $this->shortenUrl($longUrl);
        }
    }
=======
	/**
	 * UrlShortener object reference
	 * @var UrlShortener
	 */
	private $shortener;

	/**
	 * Uploader object reference.
	 * @var Uploader
	 */
	private $uploader;

	/**
	 * Shortened url of uploaded file
	 * @var string
	 */
	private $shortUrl;

	/**
	 * Initialise the object
	 * @param Uploader     $uploader  
	 * @param UrlShortener $shortener 
	 */
	public function __construct(Uploader $uploader, UrlShortener $shortener)
	{
		$this->shortener 	= $shortener;
		$this->uploader 	= $uploader;
	}

	/**
	 * Initialise bitly url shortenin service configs
	 * @return [type] [description]
	 */
	public function intConfig()
	{
		
		$this->shortener->setLogin(env('BITLY_LOGIN'));
		$this->shortener->setKey(env('BITLY_API_KEY'));
		$this->shortener->setFormat('json');
	}

	/**
	 * Upload image to cloudinary and return the shortened url
	 * @param  Image $image 
	 * @return string        shortened url
	 */
	public function upload($image)
	{
		$this->intConfig();

		if (! is_null($image)) {
			$result 	= $this->uploader->upload($image);
			$longUrl 	= $result['url'];
			$this->shortUrl =   $this->shortenUrl($longUrl);
		}
	}
>>>>>>> e95f74d... Complete image upload feature with test file

    /**
     * Shorten the file url
     * @param  string $longUrl 
     * @return string          the shortened url
     */
    public function shortenUrl($longUrl)
    {
        return $this->shortener->shortenUrl($longUrl);
    }

    /**
     * 
     * @return string
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
    }
}
