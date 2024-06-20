<?php

namespace App\Http\Controllers;

use App\Espace;
use App\Event;
use App\Restaurant;
use App\Site;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Menu;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $spaces = Espace::where('Titre', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->get();

        $restaurants = Restaurant::where('Titre', 'LIKE', "%{$query}%")
                                 ->orWhere('description', 'LIKE', "%{$query}%")
                                 ->get();

        $sites = Site::where('Titre', 'LIKE', "%{$query}%")
                                 ->orWhere('description', 'LIKE', "%{$query}%")
                                 ->get();

        $events = Event::where('Titre', 'LIKE', "%{$query}%")
                       ->orWhere('description', 'LIKE', "%{$query}%")
                       ->get();

        $menu = Menu::where('name', 'principal')->first();
        if (!$menu) {
            return view('welcome')->with('error', 'Menu non trouvé');
        }
        $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description'),
            'logo' => setting('site.logo') 
        ];

        return view('search_results', compact('spaces', 'restaurants','sites', 'events','menu', 'site_settings', 'query'));
    }
}
