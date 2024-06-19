<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use App\Product;
use App\Restaurant;
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
        $restos=Restaurant::all();
        return view('restos', [
            'restos' => $restos,
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
        $resto = Restaurant::with('photos')->findOrFail($id);
        return view('restos.show', [
            'resto' => $resto,
            'menu' => $menu,
            'site_settings' => $site_settings
        ]);
    }
}
