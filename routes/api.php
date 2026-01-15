<?php

use App\Models\Lesson;
use App\Services\ApiVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/livestream', function (ApiVideo $apiVideo, Lesson $lesson) {
    return response()->json([
        'livestream' => $apiVideo->createLivestream($lesson), // ->getLivestreamId()
    ]);
});
