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
<<<<<<< HEAD
       if (isset($file)) {
           Cloudder::upload($file);
=======
   		if (isset($file)) {
   			Cloudder::upload($file);
>>>>>>> e95f74d... Complete image upload feature with test file

           return Cloudder::getResult();
       }

       return false;
   }
}
