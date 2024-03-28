<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Art;
use App\Models\Civilization;
use App\Models\History;

class HomeController extends Controller
{
    function index(){
        try{
            $item=[];
            $history = History::orderby('created_at','desc')->first();
            $civil = Civilization::orderby('created_at','desc')->first();
            $art = Art::orderby('created_at','desc')->first();
            if($history){
                $history->thumbnail = getPhoto("histories",$history->thumbnail);
                $history->created_by = getUserName($history->created_by)->name;
                $item[0]= $history;
            }if($art){
                $art->thumbnail = getPhoto("arts",$art->thumbnail);
                $art->created_by = getUserName($art->created_by)->name;
                $item[1]= $art;
            }if($civil){
                $civil->thumbnail = getPhoto("civilizations",$civil->thumbnail);
                $civil->created_by = getUserName($civil->created_by)->name;
                $item[2]= $civil;
            }
            $ArraysItem['items'] = $item;
            $ArraysItem['sites'] = getSite();
            
            return response()->json([
                'result'=> $ArraysItem,
                'status'=>true,
            ]); 
        }catch( Exception $e){
            return response()->json([
                'result'=> false,
                'message'=> $e->getMessage(),
                'status'=>false,
            ]); 
        }
    }
}
