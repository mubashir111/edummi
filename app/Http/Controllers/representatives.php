<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\representativesModel;

class representatives extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representatives = representativesModel::where('status', 1)->get();
         return view('representative',['representatives' => $representatives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $representatives = new representativesModel;
            $representatives->name = $request->name;
            $representatives->branch = $request->branch;
            $representatives->designation = $request->designation;
          

             // Handle the logo file upload
        if ($request->hasFile('profile')) {
            foreach ($request->file('profile') as $profile) {
               
                 $profile->move(public_path('profiles'), $profile->getClientOriginalName());
                $representatives->url = 'profiles/'.$profile->getClientOriginalName();
            }
        }

         $representatives->save();

         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $representatives = representativesModel::findOrFail($id);
     $representatives->delete();
      return response()->json(['status' => 'success', 'message' => 'representative has been removed ']);
    }
}
