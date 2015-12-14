<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Helpers\UploadImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
<<<<<<< HEAD
<<<<<<< HEAD


<<<<<<< HEAD
=======


>>>>>>> 18a3b9e... Add docblock

    /**
     * @param  Request     $request  
     * @param  UploadImage $uploader 
     * @return mixed
     */
<<<<<<< HEAD
=======
>>>>>>> e95f74d... Complete image upload feature with test file
=======
>>>>>>> bfd1db8... Reformat code
=======
>>>>>>> 18a3b9e... Add docblock
    public function uplaod(Request $request, UploadImage $uploader)
    {
        if ($request->ajax()) {
            if ($request['image']) {
                $file   = $request['image'];

                $uploader->upload($file);
                
                $url    = $uploader->getShortUrl();

                return response()->json(['url' => $url]);
            }

            return response()->json(['message' => 'No file specified']);
        }

        return redirect()->back()->with('info', 'An error occured. Please try again');
    }
}
