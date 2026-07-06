<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethod('GET') && !$request->ajax() && $response->getStatusCode() === 200) {
            try {
                PageVisit::record('/');
            } catch (\Throwable) {
            }
        }

        return $response;
    }
}
