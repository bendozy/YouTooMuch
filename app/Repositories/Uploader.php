<?php
namespace App\Helpers;

use Cloudder;

class Uploader
{
    /*
    * uploads a file to cloudinary using the cloudder helper facade and returns
    * the result of the upload to the user or false if it fails;
    */
   
   public function upload($file)
   {
       if (isset($file)) {
           Cloudder::upload($file);

           return Cloudder::getResult();
       }

       return false;
   }
}
