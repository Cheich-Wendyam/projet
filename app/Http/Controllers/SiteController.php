<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Site;
use App\Models\Comment;

use TCG\Voyager\Models\Menu;



class SiteController extends Controller
{
    public function index () {

        $menu = Menu::where('name', 'principal')->first();
        if (!$menu) {
            return view('welcome')->with('error', 'Menu not found.');
        }
        $carousel_images= Site::all();
        $comments= Comment::orderBy('created_at','desc')->get();

        $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description'),
            'logo' => setting('site.logo') 
        ];
        $today_visitors = 150; 
        $month_visitors = 4500; 
        $total_visitors = 120000; 
        return view('site', [
            'menu' => $menu,
            'carousel_images' => $carousel_images,
            'site_settings' => $site_settings,
            'comments'=>$comments,
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
      $comments = Comment::orderBy('created_at','desc')->get();
      $site = Site::with('photos')->findOrFail($id);
      return view('sites.show', [
          'site' => $site,
          'menu' => $menu,
          'comments'=>$comments,
          'site_settings' => $site_settings,
          'today_visitors' => $today_visitors,
          'month_visitors' => $month_visitors,
          'total_visitors' => $total_visitors
      ]);
  }
}
