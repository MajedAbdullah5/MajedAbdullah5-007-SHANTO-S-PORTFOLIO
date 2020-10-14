<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class FullProject extends Controller
{
    function fullProjectList(){
        $result = ProjectModel::orderBy('id','desc')->get();
        return view('/content/FullProjectList',['result'=>$result]);
    }
}
