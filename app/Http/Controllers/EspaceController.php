<?php

namespace App\Http\Controllers;

use App\Espace;
use App\Http\Controllers\Controller;
use App\Product;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;

use Illuminate\Http\Request;

class EspaceController extends Controller
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
        $carousel_images= Product::all();
        $spaces= Espace::all();
        return view('espace', [
            'spaces' => $spaces,
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'site_settings' => $site_settings
        ]);
        
    }

    public function show($id)
    {
        $menu = Menu::where('name', 'principal')->first();
        $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description'),
            'logo' => setting('site.logo') 
        ];
        $space = Espace::with('photos')->findOrFail($id);
        return view('space.show', [
            'space' => $space,
            'menu' => $menu,
            'site_settings' => $site_settings
        ]);
    }
}
