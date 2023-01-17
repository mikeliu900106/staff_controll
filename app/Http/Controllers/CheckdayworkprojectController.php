<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daywork;
use App\Models\Employe;
use Carbon\Carbon;
class CheckdayworkprojectController extends Controller
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
                
                if($request->has("choose_time")&&$request->has("choose_emp_id")){
                    $choose_emp_id = $request -> choose_emp_id;
                    $choose_time = $request->choose_time;
                    $this_time=Carbon::today()->endofDay();
                    $end_time = (new Carbon($this_time))->subDays($choose_time);
                    echo $this_time;
                    echo $end_time;
                    $daywork_datas = Daywork::join('emp','emp.emp_id','=','day_work.emp_id')
                    ->select('emp.*',"day_work.*")
                    ->where('day_work.emp_id',$choose_emp_id)
                    ->where('work_start_time',">=",$end_time)
                    ->where('work_start_time',"<=", $this_time)
                    ->where('work_end_time',"<=", $this_time)
                    ->where('work_end_time',">=", $end_time)
                    ->get();
                  
                    $employe_datas = Employe::get();
                }elseif($request->has('choose_time')){
                    $choose_time = $request->choose_time;
                    $this_time=Carbon::today()->endofDay();

                    $end_time = (new Carbon($this_time))->subDays($choose_time);
                    echo $this_time;
                    echo $end_time;
                    $daywork_datas = Daywork::join('emp','emp.emp_id','=','day_work.emp_id')
                    ->select('emp.*',"day_work.*")
                    ->where('work_start_time',">=",$end_time)
                    ->where('work_start_time',"<=", $this_time)
                    ->where('work_end_time',"<=", $this_time)
                    ->where('work_end_time',">=", $end_time)
                    ->get();
                    
                    $employe_datas = Employe::get();
                }elseif($request->has("choose_emp_id")){
                    $choose_emp_id = $request -> choose_emp_id;
                    // $this_time=Carbon::now();
                    // $end_time = (new Carbon($this_time))->subDays($choose_time);
                    // echo $this_time;
                    // echo $end_time;
                    $daywork_datas = Daywork::join('emp','emp.emp_id','=','day_work.emp_id')
                    ->select('emp.*',"day_work.*")
                    ->where('day_work.emp_id',$choose_emp_id)
                    ->get();
                   
                    $employe_datas = Employe::get();
                }else{
                    $daywork_datas = Daywork::get();
                    
                    $employe_datas = Employe::get();
                    
                }
                return view("CheckDayworkproject.index",
                [
                    "daywork_datas" => $daywork_datas,
                    "employe_datas" => $employe_datas,
                ]
                );    
              
            }else{
                echo "權限不足";
                //1. 顯示錯誤2.錯誤controller
            }
        }else{
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
        Daywork::where('work_id','=', $id)->delete();
        return redirect()->route("Checkdayworkproject.index");
    }
}
