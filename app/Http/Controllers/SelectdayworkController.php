<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daywork;
use App\Models\Employe;
use Carbon\Carbon;
class SelectdayworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->session()->has('emp_id')) {
            if ($request->session()->get('level') >= 1) {
                $emp_id = session()->get('emp_id');
                    $this_time=Carbon::today()->endofDay();
                    $end_time = (new Carbon($this_time))->subDays(1);
                    echo $this_time;
                    echo $end_time;
                    $daywork_datas = Daywork::where('emp_id',$emp_id)
                    ->where('work_start_time',">=",$end_time)
                    ->where('work_start_time',"<=", $this_time)
                    ->where('work_end_time',"<=", $this_time)
                    ->where('work_end_time',">=", $end_time)
                    ->get();
                    echo $daywork_datas;
                    $employe_datas = Employe::get();
                return view("Selectdaywork.index",
                [
                    "daywork_datas" => $daywork_datas,
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
        if ($request->session()->has('emp_id')) {
            if ($request->session()->get('level') >= 1) {
                $emp_id = session()->get('emp_id');
                    $this_time=Carbon::today()->endofDay();
                    $end_time = (new Carbon($this_time))->subDays(1);
                    $daywork_datas = Daywork::where('emp_id',$emp_id)
                    ->where('work_start_time',">=",$end_time)
                    ->where('work_start_time',"<=", $this_time)
                    ->where('work_end_time',"<=", $this_time)
                    ->where('work_end_time',">=", $end_time)
                    ->get();
                    $employe_datas = Employe::get();
                return view("Selectdaywork.index",
                [
                    "daywork_datas" => $daywork_datas,
                    "emp_id"        => $emp_id,
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
