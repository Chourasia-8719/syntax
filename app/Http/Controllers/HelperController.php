<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
   public static function sendResponse($status, $message, $data){
       $response['status'] = $status?"SUCCESS":"ERROR";
       $response['message'] = $message;
       $response['data'] = $data;
       return response()->json($response,200);
   }
}
