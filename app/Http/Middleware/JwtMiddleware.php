<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Se utente è in possesso di token jwt-token supera il check del middleaware altrimenti redirect alla registration page
        try {
            $token = $request->cookie('jwt-token');

            if (!$token) {
                return redirect()->route('register-page')->with('noToken', 'Registrati per continuare');
            }

            JWTAuth::setToken($token);
            $user = JWTAuth::authenticate();

            if (!$user) {
                return response()->json(['message' => 'Utente non trovato.'], 404);
            }

        } catch (Exception $e) {
            return response()->json(['message' => 'Token non valido o scaduto.'], 401);
        }


        return $next($request);
    }
}
