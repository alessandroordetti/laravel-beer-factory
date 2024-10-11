<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtFromCookieMiddleware extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            // Recupera il token dal cookie 'jwt-token'
            $token = $request->cookie('jwt-token');

            if (!$token) {
                return response()->json(['message' => 'Token non trovato'], 401);
            }

            // Imposta il token e autentica l'utente
            JWTAuth::setToken($token);
            $user = JWTAuth::authenticate();

            if (!$user) {
                return response()->json(['message' => 'Utente non trovato'], 404);
            }

        } catch (Exception $e) {
            return response()->json(['message' => 'Token non valido'], 401);
        }

        return $next($request);
    }
}
