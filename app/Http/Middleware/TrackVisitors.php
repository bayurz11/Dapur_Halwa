<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        $exists = Visitor::where('ip', $ip)
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        if (!$exists) {
            // Panggil API lokasi berdasarkan IP
            $response = Http::get("http://ip-api.com/json/{$ip}")->json();

            Visitor::create([
                'ip' => $ip,
                'user_agent' => $request->userAgent(),
                'country' => $response['country'] ?? null,
                'city' => $response['city'] ?? null,
                'latitude' => $response['lat'] ?? null,
                'longitude' => $response['lon'] ?? null,
            ]);
        }

        return $next($request);
    }
}
