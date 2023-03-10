<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Employe;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employe_datas = Employe::get();
        return view("Login.index",['employe_datas'=>$employe_datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->flush();
        return view("index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validata = $request -> validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
 
        $employe_count = Employe::where('emp_rel_name', $validata["name"])->count();
        if($employe_count> 0){
            $employe_datas = Employe::where('emp_rel_name', $validata["name"])->get();   
            foreach($employe_datas as $employe_data){
                $name = $employe_data["emp_rel_name"];
                $password = $employe_data["emp_pass"];
                $emp_id = $employe_data["emp_id"];
                $level = $employe_data["level"];
            }
            if($validata['password'] == $password){
                Session::put('emp_id', $emp_id);
                Session::put('level', $level);
                Session::put('name', $name);
                return view('index'); 
            }
            else{
                echo "密碼錯誤";
            }
           
        }else{
            echo "帳號錯誤";
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
