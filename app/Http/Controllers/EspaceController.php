<?php

namespace App\Http\Controllers;

use App\Espace;
use App\Http\Controllers\Controller;
use App\Models\Comment;
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
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        $carousel_images= Product::all();
        $spaces= Espace::all();
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('espace', [
            'spaces' => $spaces,
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'comments'=>$comments,
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
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        $comments = Comment::orderBy('created_at', 'desc')->get();
        $space = Espace::with('photos')->findOrFail($id);
        return view('space.show', [
            'space' => $space,
            'menu' => $menu,
            'comments'=> $comments,
            'site_settings' => $site_settings,
            'today_visitors' => $today_visitors,
            'month_visitors' => $month_visitors,
            'total_visitors' => $total_visitors
        ]);
    }
}
