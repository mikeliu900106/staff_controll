<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Progrouptable;

use Carbon\Carbon;

class CheckhistoryprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('emp_id')) {
            if ($request->session()->get('level') >= 2) {
                $emp_id = session()->get('emp_id');
                $start_time=Carbon::now()->startOfDay();
                $end_time=Carbon::now()->endOfDay();
                if($request->has("choose_start_time") && $request->has("choose_end_time")){
                    $choose_time = $request -> all();

                    $project_datas = Project::join('emp','emp.emp_id',"=",'project.principal')
                    ->select('emp.*','project.*')
                    ->where('pro_s_time', '>=',$choose_time["choose_start_time"])
                    ->where('pro_e_time', '<=', $choose_time["choose_end_time"])
                    ->where('pro_close','通過')
                    ->get();

                
                }else{
                    $today = Date("ymd");
                    $project_datas = Project::join('emp','emp.emp_id',"=",'project.principal')
                    ->select('emp.*','project.*')
                    ->where('pro_close','通過')
                    ->get();
    
                }
                return view("Checkhistoryproject.index",
                    ["project_datas"=>
                        $project_datas
                    ]
                );
            }
            else{
                echo "權限不足";
                //1. 顯示錯誤2.錯誤controller
                

            }
        }
        else{
            echo "你沒登入";
        }
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
        // echo $id;
        Project::where('pro_id', '=', $id)->delete();
        return redirect()->route("Checkhistoryproject.index");
    }
}
