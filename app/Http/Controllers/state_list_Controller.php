<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state_list_Model;
use Illuminate\Http\JsonResponse;

class state_list_Controller extends Controller
{
    
   public function getStateList()
{
   $state_list = state_list_Model::select('StateName')
        ->where('state_type', 'State')
        ->groupBy('StateName')
        ->get();

  

   if ($state_list->isNotEmpty()) {
       return response()->json($state_list->pluck('StateName'));
   }
}


public function getdistrictList(Request $request){

    $State= $request->state;

     $district_list = state_list_Model::where('StateName',$State)->get();

      if ($district_list->isNotEmpty()) {
       return response()->json($district_list->pluck('District'));
   }
}




}
