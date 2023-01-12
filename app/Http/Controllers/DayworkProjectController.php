<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Daywork;

class DayworkprojectController extends Controller
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
                $project_datas = Project::get();
                return view("Dayworkproject.index",
                ["project_datas" => $project_datas]
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
        function get_work_id()
        {
            $today = date("Ymd");
            $nums = Daywork::count();
            // echo $nums;
            $id = "W" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $emp_id = session()->get('emp_id');
        $work_id = get_work_id();
        $day_work_type = $request->day_work_type;
        $day_work_type = implode("、",$day_work_type);
        // echo $day_work_type;
        $validate = $request->validate([
            'work_name'     => 'required',
            'start_time'    => 'required',
            'end_time'      => 'required',
            'work_talk'     => 'required|string',    
        ]);
        echo $validate["start_time"];
        Daywork::create(
            [
                "emp_id"            => $emp_id,
                "work_id"           => $work_id,
                "work_name"         => $validate["work_name"],
                "work_start_time"   => $validate["start_time"],
                "work_end_time"     => $validate["end_time"],
                "work_talk"         => $validate["work_talk"],
                "work_type"         => "專案",
                "pro_type"          => $day_work_type,
            ]
        );
        return redirect()->route("Daywork   .index");
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
