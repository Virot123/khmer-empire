<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Media;
use App\Models\User;
class AboutUsController extends Controller
{
    function index(){
        $result = User::with("medias")->limit(3)->get();
        foreach($result as $re){
            $re->profile = getPhoto($re->profile);
            if($re->medias){
                foreach ($re->medias as $m){
                    $m->thumbnail= getMediaPhoto($m->thumbnail);
                }
            }
        }
        return response()->json([
            'result'=> $result,
            'status'=>true,
        ]); 
    }
}
