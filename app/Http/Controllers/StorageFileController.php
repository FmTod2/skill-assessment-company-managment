<?php

namespace App\Http\Controllers;

// use Faker\Core\File;
use Illuminate\Http\Request;
use File;
use Response;

class StorageFileController extends Controller
{
    public function getPubliclyStorgeFile($filename)
    {
        $path = storage_path('app/public/logos/'. $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
