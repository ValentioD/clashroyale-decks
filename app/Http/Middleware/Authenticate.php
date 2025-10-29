<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        // Als het geen JSON-request is (dus gewoon een webpagina)
        if (!$request->expectsJson()) {
            // Toon een melding dat login vereist is
            session()->flash('status', 'Maak eerst een account aan voordat je een deck kunt aanmaken.');

            // Stuur nu naar de registratiepagina i.p.v. login
            return route('register');
        }

        // Voor API's of JSON-requests doen we geen redirect
        return null;
    }
}
