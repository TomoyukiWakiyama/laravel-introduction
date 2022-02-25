<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //
        $data =[
            ['name'=>'user1', 'mail'=>'user1@fake.com'],
            ['name'=>'user2', 'mail'=>'user2@fake.com'],
            ['name'=>'user3', 'mail'=>'user3@fake.com'],
        ];
        $request->merge(['data'=>$data]);
        return $next($request);
    }
}
