<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\visitorsModel;

class visitorController extends Controller
{
    function home()
    {
        $visitor_data = json_decode(visitorsModel::orderBy('id','desc')->get());
        return view('visitor', ["key" => $visitor_data]);
    }
    function deleteAllVisitor(){
      visitorsModel::truncate();
      header('Location:'.'/visitors');
      die();
    }
}
