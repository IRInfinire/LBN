<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\QuestionReceipients;

class reportPermission {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $recordExists = QuestionReceipients::where('id', $request->id)->where('physician_id', Auth::user()->getUserId())->first();
        if (!$recordExists) {
            return response()->view('errors.401', [], 401);
        }
        return $next($request);
    }

}
