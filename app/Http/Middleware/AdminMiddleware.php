<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next): Response
     {
         // xác thực, nếu người dùng chưa đăng nhập thì trả về login
         if(!Auth::check()){
             return redirect('/login');
         }
 
         // kiểm tra role có đúng là admin hay không
         // nếu không phải thì sẽ trả về form list
         if(Auth::user()->role !== 'admin'){
             return redirect('/')->with('error','Bạn không đủ quyền truy cập');
         }
         return $next($request);
     }
}
