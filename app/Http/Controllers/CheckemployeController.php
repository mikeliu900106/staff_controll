<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daywork;
use App\Models\Employe;
class CheckemployeController extends Controller
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
                $employe_datas = Employe::get();
                return view("Checkemploye.index",["employe_datas" => $employe_datas]);
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
        $emp_id =$request->emp_id;
        return view("Checkemploye.update",["emp_id"=>$emp_id]);
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
        echo $id;
        $validate = $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string',
            'real_name' => 'required|string',
            'number'    => 'required',    
            'level'     =>  'required'
        ]);
        echo $validate ["level"];
        Employe::where("emp_id",$id)->update(
            [
                "emp_id"        =>  $id,
                "emp_rel_name"  =>  $validate["real_name"],
                "emp_username"  =>  $validate["username"],
                "emp_pass"      =>  $validate["password"],
                "emp_tel"       =>  $validate["number"],
                "level"         =>  $validate["level"],
            ]
        );
        return redirect()->route("Checkemploye.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::where("emp_id",$id)->delete();
        return redirect()->route("Checkemploye.index");
    }
}
