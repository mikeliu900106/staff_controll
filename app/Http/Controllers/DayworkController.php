<?php

namespace App\Http\Controllers;
use App\Models\Daywork;
use Illuminate\Http\Request;

use Carbon\Carbon;
class DayworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request
    )
    {

        if ($request->session()->has('emp_id')) {
            if ($request->session()->get('level') >= 1) {
                // $emp_id = session()->get('emp_id');
                // $start_time=Carbon::now()->startOfDay();
                // $end_time=Carbon::now()->endOfDay();
                // if($request->has("choose_start_time") && $request->has("choose_end_time")){
                //     $choose_time = $request -> all();
                //     $daywork_datas = Daywork::where("emp_id",$emp_id)
                //     ->where('work_start_time', '>',$choose_time["choose_start_time"])
                //     ->where('work_end_time', '<', $choose_time["choose_end_time"])
                //     ->get();
                // }else{
                //     $today = Date("ymd");
                //     $daywork_datas = Daywork::where("emp_id",$emp_id)
                //     ->where('work_start_time', '>=',$start_time)
                //     ->where('work_end_time', '<=', $end_time)
                //     ->get();
    
                // }
                // return view("Daywork.index",
                //     ["daywork_datas"=>
                //         $daywork_datas
                //     ]
                // );
                return view("Daywork.store");
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
        return view("Daywork.store");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        function get_work_id()
        {
            $today = date("Ymd");
            $nums = Daywork::count();
            // echo $nums;
            $id = "W" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $emp_id = session()->get('emp_id');
        echo $emp_id ;
        $work_id = get_work_id();
        
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
                "work_id"           => $work_id,
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
        return redirect()->route("Daywork.index");

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
