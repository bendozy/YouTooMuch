<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\UploadImage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function upload(Request $request, UploadImage $uploader)
    {
        if ($request->ajax()) {
            if ($request['image']) {
                $file = $request['image'];

                $uploader->upload($file);

                $url = $uploader->getShortUrl();

                return response()->json(['url' => $url]);
            }

            return response()->json(['Message' => 'No image specified']);
        }

        return response()->json(['Error' => 'An unknown error occured, Please try again']);
    }
}
