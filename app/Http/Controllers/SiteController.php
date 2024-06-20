<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Site;

use TCG\Voyager\Models\Menu;



class SiteController extends Controller
{
    public function index () {

        $menu = Menu::where('name', 'principal')->first();
        if (!$menu) {
            return view('welcome')->with('error', 'Menu not found.');
        }
        $carousel_images= Site::all();

        $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description'),
            'logo' => setting('site.logo') 
        ];
       
        return view('site', [
            'menu' => $menu,
            'carousel_images' => $carousel_images,
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
      $site = Site::with('photos')->findOrFail($id);
      return view('sites.show', [
          'site' => $site,
          'menu' => $menu,
          'site_settings' => $site_settings
      ]);
  }
}
