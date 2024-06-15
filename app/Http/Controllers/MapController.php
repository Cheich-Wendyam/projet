<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Product;
use App\Espace;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $menu = Menu::where('name', 'principal')->first();
        if (!$menu) {
            return view('welcome')->with('error', 'Menu not found.');
        }
        $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description'),
            'logo' => setting('site.logo') 
        ];
        $spaces= Espace::all();
        $carousel_images= Product::all();
        return view('map', [
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'site_settings' => $site_settings,
            'spaces' => $spaces
        ]);
        
    }
}
