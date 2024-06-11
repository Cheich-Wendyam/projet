<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use App\Product;

use Illuminate\Http\Request;

class RestosController extends Controller
{
    public function index(){
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
        return view('restos', [
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'site_settings' => $site_settings
        ]);
       }
}
