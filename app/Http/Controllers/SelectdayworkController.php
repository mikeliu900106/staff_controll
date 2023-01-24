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
                if($request->has("choose_time")){
                    $choose_time = $request->choose_time;
                    $this_time=Carbon::today()->endofDay();
                    $end_time = (new Carbon($this_time))->subDays($choose_time);
                    echo $this_time;
                    echo $end_time;
                    $daywork_datas = Daywork::where('emp_id',$emp_id)
                    ->where('work_start_time',">=",$end_time)
                    ->where('work_start_time',"<=", $this_time)
                    ->where('work_end_time',"<=", $this_time)
                    ->where('work_end_time',">=", $end_time)
                    ->get();
                    // echo $daywork_datas;
                    $employe_datas = Employe::get();
                }else{
                    $daywork_datas = Daywork::where('emp_id',$emp_id)
                    ->get();
                }
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
    public function create(Request $request)
    {
        if ($request->session()->has('emp_id')) {
            if ($request->session()->get('level') >= 1) {
                $work_id = $request ->work_id ;
                return view('Selectdaywork.update',["work_id" => $work_id]);
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
        $emp_id = session()->get('emp_id');
        $validate = $request->validate([
            'work_name'     => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            'work_talk'     => 'required|string',    
        ]);
        $start_time = carbon::parse ($validate["start_time"]);
        $end_time = carbon::parse ($validate["end_time"]);
        $total_time = ($end_time)->diffInMinutes ($start_time, true);
        $total_day = floor($total_time / 1400);
        $total_hour = floor(($total_time%1400)/60);
        $total_minute = ($total_time%1400)%60;
        Daywork::create(
            [
                "emp_id"            => $emp_id,
                "work_id"           => $id,
                "work_name"         => $validate["work_name"],
                "work_start_time"   => $validate["start_time"],
                "work_end_time"     => $validate["end_time"],
                "work_talk"         => $validate["work_talk"],
                "work_type"         => "日常工作",
                "pro_type"          => "日常工作沒有工作型態",
                'total_day'         => $total_day,
                'total_hour'        => $total_hour,
                'total_minute'      => $total_minute,
            ]
        );
        return redirect()->route("Selectdaywork.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Daywork::where('work_id',$id)->delete();
        return redirect()->route("Selectdaywork.index");
    }
}
