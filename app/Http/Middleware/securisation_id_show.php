<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class securisation_id_show
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
        $clients = Client::where('user_id', Auth::user()->id)->get('id');
        $tableau = [];
        foreach ($clients as $client => $value) {
            array_push($tableau,$value->id);
        }
        
        if (in_array($request->client->id,$tableau)) {
            return $next($request);
        }
        else{
            return redirect('/clients');
        }
    }
}
