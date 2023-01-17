<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Signup.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp_id = session()->get('emp_id');
        return view("Signup.update",["emp_id"=> $emp_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function get_employe_id()
        {
            $today = date("Ymd");
            $nums = Employe::count();
            // echo $nums;
            $id = "E" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $employe_datas = $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string',
            'real_name' => 'required|string',
            'number'    =>  'required',    
            'level'     =>  'required'
        ]);
        echo$employe_datas["username"];
        $employe_id = get_employe_id();
        $is_username_use = Employe::where( "emp_username" , $employe_datas["username"])->count();
        echo $is_username_use;
        echo $employe_datas["level"];
        if($is_username_use <= 0){
            Employe::create(
                [
                    "emp_id"        =>  $employe_id,
                    "emp_rel_name"  =>  $employe_datas["real_name"],
                    "emp_username"  =>  $employe_datas["username"],
                    "emp_pass"      =>  $employe_datas["password"],
                    "emp_tel"       =>  $employe_datas["number"],
                    "level"         =>  $employe_datas["level"],
                ]
            );
            return view("index");
        }else{
            echo "帳號已被使用";
        }
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
        $employe_datas = $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string',
            'real_name' => 'required|string',
            'number'    => 'required',    
        ]);
        echo$employe_datas["username"];

        $is_username_use = Employe::where( "emp_username" , $employe_datas["username"])->count();

        if($is_username_use <= 0){
            Employe::where("emp_id",$id)->update(
                [
                    "emp_rel_name"  =>  $employe_datas["real_name"],
                    "emp_username"  =>  $employe_datas["username"],
                    "emp_pass"      =>  $employe_datas["password"],
                    "emp_tel"       =>  $employe_datas["number"],
                ]
            );
            $request->session()->flush();
            return view("Login.index");
        }else{
            echo "帳號已被使用";
        }
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
