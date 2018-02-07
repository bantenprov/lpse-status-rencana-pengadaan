<?php namespace Bantenprov\StatusRencanaPengadaan\Http\Middleware;

use Closure;

/**
 * The StatusRencanaPengadaanMiddleware class.
 *
 * @package Bantenprov\StatusRencanaPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusRencanaPengadaanMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
