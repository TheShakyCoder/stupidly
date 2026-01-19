<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/debug-s3', function () {
    try {
        // Attempt to list files to trigger client instantiation
        Storage::disk('spaces')->files();
        return 'Connected successfully to Spaces!';
    } catch (\Exception $e) {
        return 'Connection failed: ' . $e->getMessage();
    }
});
