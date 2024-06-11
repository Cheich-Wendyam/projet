<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index () {
         // Récupérer le menu
         $menu = Menu::where('name', 'principal')->first();
         // Vérifiez que le menu existe
         if (!$menu) {
             return view('welcome')->with('error', 'Menu not found.');
         }
 

 
         $site_settings = [
             'title' => setting('site.title'),
             'description' => setting('site.description'),
             'logo' => setting('site.logo') 
         ];
     
         $carousel_images= Product::all();
 
         return view('welcome', [
             'carousel_images' => $carousel_images,
             'menu' => $menu,
             'site_settings' => $site_settings
         ]);
    }

    public function layout () {
        // Récupérer le menu
        $menu = Menu::where('name', 'principal')->first();
        // Vérifiez que le menu existe
        if (!$menu) {
            return view('welcome')->with('error', 'Menu not found.');
        }



        $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description'),
            'logo' => setting('site.logo') 
        ];
    
        $carousel_images= Product::all();

        return view('layout', [
            'carousel_images' => $carousel_images,
            'menu' => $menu,
            'site_settings' => $site_settings
        ]);
   }

   
}
