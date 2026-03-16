<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Don't log admin routes or API routes unless desired
        if ($request->is('admin*') || $request->is('api*')) {
            return $response;
        }

        try {
            $userAgent = $request->header('User-Agent');
            $deviceType = 'desktop';

            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobi))/i', $userAgent)) {
                $deviceType = 'tablet';
            } elseif (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', $userAgent)) {
                $deviceType = 'mobile';
            }

            \App\Models\Visit::create([
                'ip_address' => $request->ip(),
                'user_agent' => $userAgent,
                'device_type' => $deviceType,
                'page_visited' => $request->fullUrl(),
                'session_id' => $request->session()->getId(),
                // Basic platform/browser detection could be added here
            ]);
        } catch (\Exception $e) {
            // Silently fail logging if error occurs
            Log::error('Visit logging failed: ' . $e->getMessage());
        }

        return $response;
    }
}
