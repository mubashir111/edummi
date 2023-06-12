<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newsModel;
use App\Models\representativesModel;
use App\Models\leadsModdel;
use App\Models\applicationModel;
use App\Models\studentsModel;


class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = newsModel::all();

        $representatives = representativesModel::where('status', 1)->get();
           
         $followup = leadsModdel::where('status', '!=' , 7)->count();   

        $userRole = auth()->user()->role;
        if ($userRole === "superadmin") {
            
            $leads = leadsModdel::count();

        $application = applicationModel::count();

        $DOCUMENTATION_PENDING = studentsModel::where('document_status','pending')->count();


        $waitingforoffer = applicationModel::where('current_status',7)->count();

         $application_submitted = applicationModel::where('current_status',5)->count();

          $application_rejected = applicationModel::where('current_status',2)->count();

          $offer_declined = applicationModel::where('current_status',9)->count();


         

          
 

        } elseif ($userRole === "Branch_Owner") {




$leads = leadsModdel::where('referred_by', auth()->user()->id)->count();

        $application = applicationModel::where('manager_id', auth()->user()->id)->count();

        $DOCUMENTATION_PENDING = studentsModel::where('manager_id', auth()->user()->id)->where('document_status','pending')->count();


        $waitingforoffer = applicationModel::where('manager_id', auth()->user()->id)->where('current_status',7)->count();

         $application_submitted = applicationModel::where('manager_id', auth()->user()->id)->where('current_status',5)->count();

          $application_rejected = applicationModel::where('manager_id', auth()->user()->id)->where('current_status',2)->count();

          $offer_declined = applicationModel::where('manager_id', auth()->user()->id)->where('current_status',9)->count();




        } else{
           
           $leads = leadsModdel::where('referred_by', auth()->user()->id)->count();

        $application = applicationModel::where('referred_by', auth()->user()->id)->count();

        $DOCUMENTATION_PENDING = studentsModel::where('referred_by', auth()->user()->id)->where('document_status','pending')->count();


        $waitingforoffer = applicationModel::where('referred_by', auth()->user()->id)->where('current_status',7)->count();

         $application_submitted = applicationModel::where('referred_by', auth()->user()->id)->where('current_status',5)->count();

          $application_rejected = applicationModel::where('referred_by', auth()->user()->id)->where('current_status',2)->count();

          $offer_declined = applicationModel::where('referred_by', auth()->user()->id)->where('current_status',9)->count();
           
        }


       

          return view('home', ['news' => $news,'representatives' => $representatives ,'leads' => $leads , 'application' => $application,'DOCUMENTATION_PENDING' => $DOCUMENTATION_PENDING,'waitingforoffer' => $waitingforoffer,'application_submitted' => $application_submitted,'offer_declined' => $offer_declined,'application_submitted' => $application_submitted,'followup' => $followup]);

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
        //
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
        //
    }
}
