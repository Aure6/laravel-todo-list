<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* // Si le paramètre locale existe dans l'URL, on le récupère
        if ($request->has('locale')) {
            // $locale = $request->get('locale');
            // On récupère la langue de la session ou la langue par défaut
            $locale = Session::get('locale', config('app.locale'));
            // On vérifie que la langue est supportée par l'application
            if (in_array($locale, config('app.supported_locales', []))) {
                // On enregistre la langue dans la session
                Session::put('locale', $locale);
            }
        }

        // On récupère la langue de la session ou la langue par défaut
        $locale = Session::get('locale', config('app.locale'));
        // On définit la langue de l'application
        // App::setLocale($locale);
        app()->setLocale($locale);*/

        /* if (session()->has('locale')) {
            App::setLocale(session('locale'));
        } */

        // Get the selected language from session
        $language = session('language');

        // Set the current language
        app()->setLocale($language);

        // Log the updated locale for verification
        // Log::info("Locale set to : " . $language . " (Selected language: " . $language . ")");

        return $next($request);
    }
}
