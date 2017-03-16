<?php

    function formatDate($date = null, $comma = null){
        $dates = date_create($date);
        if($comma == null){
            return date_format($dates,"Y/m/d");
        }else{
            return date_format($dates,"Y".$comma."m".$comma."d");
        }
    }

    function formatYm($date = null, $comma = null){
        $ym     = str_split($date, 4);
        $y = $ym[0];
        $m = $ym[1];
        if($comma == null){
            return $y."/".$m;
        }else{
            return $y.$comma.$m;
        }
    }

    function permission($power){
        $arr = array('1'=>'Admin', '2'=>'Staff','3'=>'Guest');
        return @$arr[$power];
    }

    function status($status){
        if($status == 1){
            return "Active";
        }else{
            return "Iactive";
        }
    }

    function cContact(){
       $cContact = App\Http\Controllers\Backend\ContactController::countContact();
        return $cContact;
    }

