<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MashupController extends Controller
{

    //JPG image quality 0-100
    private $quality = 100;

    public function createImage()
    {
        $i = 30;

        $file = public_path().'/pass.jpg';

        // define the base image that we lay our text on
        $im = imagecreatefromjpeg($file);

        // set the text colour
        $color = imagecolorallocate($im, 55, 189, 102);

        // this defines the starting height for the text block
        $y = imagesy($im) - 365;

     
        // center the text in our image - returns the x value
        $x = $this->center_text($_POST['name'], 27); 

        imagettftext($im, 27, 0, $x, $y+$i, $color, public_path().'/Capriola-Regular.ttf', $_POST['name']);
    
        // create the image and save to public folder
        imagejpeg($im, public_path().'/newimage.jpg', $this->quality);
                
        return view('image');
    }

    private function center_text($string, $font_size)
    {

        $image_width = 800;

        $dimensions = imagettfbbox($font_size, 0, public_path().'/Capriola-Regular.ttf', $string);

        return ceil(($image_width - $dimensions[4]) / 2);       
    }

}
