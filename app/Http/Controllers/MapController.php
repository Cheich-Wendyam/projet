<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Product;
use App\Espace;
use App\Event;
use App\Hotel;
use App\Restaurant;
use App\Site;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;
use App\Models\Comment;

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
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        $spaces= Espace::all();
        $restos=Restaurant::all();
        $resto = Restaurant::all();
        $sitedata=Site::all();
        $spacedata=Espace::all();
        $sites=Site::all();
        $event=Event::all();
        $hotels=Hotel::all();
        $comments= Comment::orderBy('created_at','desc')->get();
        $carousel_images= Product::all();
        return view('map', [
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'comments'=>$comments,
            'site_settings' => $site_settings,
            'spaces' => $spaces,
            'restos' => $restos,
            'resto' => $resto,
            'sites' => $sites,
            'sitedata' => $sitedata,
            'spacedata' => $spacedata,
            'event' => $event,
            'hotels' => $hotels,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors

        ]);
        
    }

    public function show($id)
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
        $comments= Comment::orderBy('created_at','desc')->get();
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        $spaces= Espace::all();
        $restos=Restaurant::all();
        $hotels=Hotel::all();
        $sites=Site::all();
        $event=Event::all();
        $resto = Restaurant::findOrFail($id);
        return view('map', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'sites' => $sites,
            'resto' => $resto,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
            
        ]);
    }
    

}
