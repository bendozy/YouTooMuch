<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Helpers\UploadImage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }
    
    public function upload(Request $request, UploadImage $uploader)
    {
        if ($request->ajax()) {
            if ($request['image']) {

                $file       = $request['image'];

                $uploader->upload($file);

                $url        = $uploader->getShortUrl();
                $publicId   = $uploader->getPublicId();

                $saved      = $this->saveImageDetails($url, $publicId);

                if ($saved) {
                    return response()->json(['url' => $url, 'public_id' => $publicId]);
                }

                return response()->json(['message' => 'Error saving image details.']);
            }

            return response()->json(['Message' => 'No image specified']);
        }

        return response()->json(['Error' => 'An unknown error occured, Please try again']);
    }

    public function saveImageDetails($url, $publicId)
    {
        $this->image->url       = $url;
        $this->image->public_id = $publicId;

        return $this->image->save();
    }
}
