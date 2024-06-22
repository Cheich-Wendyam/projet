<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Product;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;

use Illuminate\Http\Request;

class EventController extends Controller
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
        $events=Event::all();
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        return view('event', [
            'events' => $events,
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
        $events = Event::with('photos')->findOrFail($id);
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        return view('events.show', [
            'events' => $events,
            'menu' => $menu,
            'site_settings' => $site_settings,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }
}
