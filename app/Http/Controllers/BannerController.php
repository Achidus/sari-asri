<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class FrontendBannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 'aktif')->get();
        return view('pages.frontend.banner', compact('banners'));
    }
}
