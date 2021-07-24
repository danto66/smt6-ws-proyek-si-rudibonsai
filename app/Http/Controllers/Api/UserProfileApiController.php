<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserProfileApiController extends Controller
{
    public function getPicture($filename)
    {
        $path = 'storage/img/profile-picture/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->response($path);
    }
}
