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

    public function indexsite()
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
        $site=Site::all();
        $spacedata=Espace::all();
        $sites=Site::all();
        $event=Event::all();
        $hotels=Hotel::all();
        $comments= Comment::orderBy('created_at','desc')->get();
        $carousel_images= Product::all();
        return view('mapsite', [
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'comments'=>$comments,
            'site'=> $site,
            'site_settings' => $site_settings,
            'spaces' => $spaces,
            'restos' => $restos,
            'resto' => $resto,
            'sites' => $sites,
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
    
    public function showSite($id)
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
        $resto = Restaurant::all();
        $hotels=Hotel::all();
        $sites=Site::all();
        $event=Event::all();
        $site=Site::findOrFail($id);
        return view('mapsite', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'resto' => $resto,
            'sites' => $sites,
            'site' => $site,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
            
        ]);
    }

    public function indexspace() 
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
        return view('mapspace', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'sites' => $sites,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
            
        ]); 
    }

    public function showSpace($id)
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
        $space = Espace::findOrFail($id);
        return view('mapspace', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'sites' => $sites,
            'space' => $space,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
            
        ]);
    }

    public function indexevent() 
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
        return view('mapvent', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'sites' => $sites,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }

    public function showEvent($id)
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
        $events = Event::findOrFail($id);
        return view('mapevent', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'events' => $events,
            'restos' => $restos,
            'sites' => $sites,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }

    public function indexhotel() 
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
        return view('maphotel', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'sites' => $sites,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }

    public function showhotel($id)
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
        $hotel = Hotel::findOrFail($id);
        return view('maphotel', [
            'menu' => $menu,
            'event' => $event,
            'hotels' => $hotels,
            'site_settings' => $site_settings,
            'comments'=> $comments,
            'spaces' => $spaces,
            'restos' => $restos,
            'sites' => $sites,
            'hotel' => $hotel,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }


}
