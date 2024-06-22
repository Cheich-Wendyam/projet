<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Menu;

class HotelController extends Controller
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
        $hotels=Hotel::all();
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        return view('hotel', [
            'hotels' => $hotels,
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'site_settings' => $site_settings,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
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
        $hotels = Hotel::with('photos')->findOrFail($id);
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        return view('hotels.show', [
            'hotels' => $hotels,
            'menu' => $menu,
            'site_settings' => $site_settings,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }
}
