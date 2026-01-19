<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function page($page)
    {
        return Inertia::render('Page', [
            'page' => $page,
        ]);
    }
}
