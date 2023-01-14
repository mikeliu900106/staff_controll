<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daywork;
use App\Models\Employe;
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
                $emp_id = session()->get('emp_id');
                if($request->has("choose_emp_id") ){
                    $choose_emp_id = $request -> choose_emp_id;
                    $daywork_datas = Daywork::where('emp_id',$choose_emp_id)
                    ->where('work_type','專案')
                    ->get();
                    $employe_datas = Employe::get();
                }else{
                    $today = Date("y-m-d");
                    $daywork_datas = Daywork::where('work_type','專案')
                    ->get();
                    $employe_datas = Employe::get();
                
                }
                return view("CheckDaywork.index",
                [
                    "daywork_datas" => $daywork_datas,
                    "employe_datas" => $employe_datas,
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
        Daywork::where('work_id','=', $id)->delete();
        return redirect()->route("Checkdaywork.index");
    }
}
