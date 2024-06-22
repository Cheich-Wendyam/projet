<?php

namespace App\Http\Controllers;

use App\Espace;
use App\Event;
use App\Hotel;
use App\Restaurant;
use App\Site;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Menu;

class SearchController extends Controller
{
    public function search(Request $request)
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
        $query = $request->input('query');

        // Recherche par type d'élément spécifique
        switch (strtolower($query)) {
            case 'espace':
            case 'loisir':
                $spaces = Espace::all();
                return view('search_results', compact('spaces', 'query','menu', 'site_settings','today_visitors', 'month_visitors', 'total_visitors'));
                break;
            case 'restaurant':
                $restaurants = Restaurant::all();
                return view('search_results', compact('restaurants', 'query','menu', 'site_settings','today_visitors', 'month_visitors', 'total_visitors'));
                break;
            case 'hotel':
            case 'hôtel':
                $hotels = Hotel::all();
                return view('search_results', compact('hotels', 'query','menu', 'site_settings','today_visitors', 'month_visitors', 'total_visitors'));
                break;
            case 'site':
            case 'sites':
            case 'tourisme':
            case 'monument':
            case 'sites touristiques':
                $sites = Site::all();
                return view('search_results', compact('sites', 'query','menu', 'site_settings','today_visitors', 'month_visitors', 'total_visitors'));
                break;
            case 'event':
            case 'événement':
                $events = Event::all();
                return view('search_results', compact('events', 'query','menu', 'site_settings','today_visitors', 'month_visitors', 'total_visitors'));
                break;
            default:
                // Recherche générale sur tous les types d'éléments
                $spaces = Espace::where('Titre', 'LIKE', "%{$query}%")
                                ->orWhere('description', 'LIKE', "%{$query}%")
                                ->get();

                $restaurants = Restaurant::where('Titre', 'LIKE', "%{$query}%")
                                        ->orWhere('description', 'LIKE', "%{$query}%")
                                        ->get();

                $hotels = Hotel::where('Titre', 'LIKE', "%{$query}%")
                                ->orWhere('description', 'LIKE', "%{$query}%")
                                ->get();

                $sites = Site::where('Titre', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

                $events = Event::where('Titre', 'LIKE', "%{$query}%")
                                ->orWhere('description', 'LIKE', "%{$query}%")
                                ->get();

                // Vérifie si aucun résultat n'a été trouvé
                if ($spaces->isEmpty() && $restaurants->isEmpty() && $hotels->isEmpty() && $sites->isEmpty() && $events->isEmpty()) {
                    return view('search_results', compact('query','menu', 'site_settings','today_visitors', 'month_visitors', 'total_visitors'))->with('error', "Aucun résultat trouvé pour '{$query}'.");
                }

                return view('search_results', compact('spaces','menu', 'site_settings', 'restaurants', 'hotels', 'sites', 'events', 'query','today_visitors', 'month_visitors', 'total_visitors'));
                break;
        }
    }
}
