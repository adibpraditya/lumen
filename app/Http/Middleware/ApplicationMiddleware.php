<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use App\Model\AppKey;

class ApplicationMiddleware
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

        //$channel = $request->header('Channel');
        //$key = $request->header('Key');


        /*if(!($channel == 'express' && $key == '123456789')){
            $response = array(
                'status' => 'fail',
                'data' => array(
                    'message' => $channel .' '.$key
                )
            );
            return response()->json($response, 401);
        }*/

        //return $next($request);
        $log = "\n=================START LOG==================";
        $log = $log . "\nIP : ".$request->ip();
        $log = $log . "\nURL : ".$request->url();
        $log = $log . "\nMethod : ".$request->method();
        $log = $log . "\nContent Type : ".$request->header('content-type');
        //$log = $log. "\nHeader : ".json_encode($request->header());
        $log = $log . "\nRequest : ".json_encode($request->all());
        
        $response = $next($request);
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        $response->header('Access-Control-Allow-Origin', '*');
        
        $log = $log . "\nResponse : ".json_encode($response);
        $log = $log . "\n==================END LOG===================";
        Log::info($log);
        
        return $response;
    }

}