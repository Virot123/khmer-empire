<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
    
    if (! function_exists('getStatus')) {
        function  getStatus($value){
            return $value=="1"?"Active":"Inactive";
        }
    }

    
    if (! function_exists('getUserName')) {
        function  getUserName($id){
            return \DB::table("users")->find($id,['name']);
        }
    }

    if (! function_exists('getMediaPhoto')) {
        function  getMediaPhoto($thumbnail){
            return asset('storage/medias/'.$thumbnail.".jpg");
        }
    }

    if (! function_exists('getPhoto')) {
        function  getPhoto($profile){
            return asset('storage/users/'.$profile);
        }
    }
    

    
?>