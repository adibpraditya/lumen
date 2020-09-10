<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use App\Model\AppKey;

class ApplicationAccess
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*$now = date("Y-m-d H:i:s");
        $log = "\nHeader : ".json_encode($request->header());
        
        $channel = $request->header('Channel');
        $key = $request->header('Key');

        $credentials = AppKey::where('channel', $channel)->where('key', $key)->get();

        if(!count($credentials) > 0){
            $response = array(
                'status' => 'fail',
                'data' => array(
                    'message' => 'missing token'
                )
            );
            $log = $log . "\nResponse : ".json_encode($response)."\n[$now] lumen.INFO END";
            Log::info($log);
            return response()->json($response, 401);
        }*/

        //return $next($request);
        $response = $next($request);
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        $response->header('Access-Control-Allow-Origin', '*');
        return $response;
    }

}