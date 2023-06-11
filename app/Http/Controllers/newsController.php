<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newsModel;
use Carbon\Carbon;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $news = newsModel::all();

           return view('manage-news', ['news' => $news]);

          return back();
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
        

        $news = new newsModel;
        $news->title = $request->title;
        $news->sub_title = $request->sub_title;
        $news->content = $request->content;
        $news->news_type = $request->news_type;
        $news->manager_id = $request->manager_id;
        $news->created_at = Carbon::now();

           // Handle the logo file upload
        if ($request->hasFile('icon')) {
            foreach ($request->file('icon') as $icon) {
                $icon->move(public_path('icons'), $icon->getClientOriginalName());
                $news->url = 'icons/'.$icon->getClientOriginalName();
            }
        }

         $news->save();

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
        $news = newsModel::findOrFail($id);
     $news->delete();
      return response()->json(['status' => 'success', 'message' => 'News has been removed ']);
    }
}
