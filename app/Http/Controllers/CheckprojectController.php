<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Employe;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CheckprojectController extends Controller
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
                if($request->has("choose_project_name")){
                    $choose_project_name = $request -> choose_project_name;
                    $project_datas = Project::join("emp", "emp.emp_id", "=", "project.principal")
                    ->select("project.*", "emp.*")
                    ->where("project.pro_close", "!=", "通過")
                    ->where("project.pro_name","=",$choose_project_name)
                    ->get();
                    $project_names = Project::select("pro_name")
                    ->where("pro_close","!=","通過")
                    ->get();
                    echo $project_datas;
                }else{
                    $this_time=Carbon::now()->toDateString();
                    $project_datas = Project::join("emp", "emp.emp_id", "=", "project.principal")
                    ->select("project.*", "emp.*",)
                    ->where("project.pro_close", "!=", "通過")
                    ->get();
                    $project_names = Project::select("pro_name")
                    ->where("pro_close","!=","通過")
                    ->get();
                    echo $project_datas;
               
                }
                return view("Checkproject.index",
                [

                    'project_datas' => $project_datas,
                    'project_names'  => $project_names
                ]);
              
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
        $employe_datas = Employe::where("level","<=",2)->get();
        return view("Checkproject.store",[
            'employe_datas' => $employe_datas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function get_project_id()
        {
            $today = date("Ymd");
            $nums = Project::count();
            // echo $nums;
            $id = "P" . (($today * 10000) + ($nums + 1));
            return $id;
        }
        $pro_id = get_project_id();
        $validate = $request->validate([
            'pro_name'      => 'required',
            'create_time'   => 'required',
            'pro_content'   => 'required',
            'principal'     => 'required|string',    
        ]);
        Project::create(
            [
                "pro_id"            => $pro_id,
                "pro_name"          => $validate["pro_name"],
                "pro_content"       => $validate["pro_content"],
                "pro_s_time"        => $validate["create_time"],
                "pro_close"         => "未完成",
                "principal"         => $validate["principal"],
            ]
        );
        return redirect()->route("Checkproject.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_employe_datas = Project::join("day_work", "day_work.work_name", "=", "project.pro_name")
                    ->join("emp", "emp.emp_id", "=", "day_work.emp_id")
                    ->select("project.*", "emp.*","day_work.*")
                    ->where("project.pro_close", "!=", "通過")
                    ->where("project.pro_id","=",$id)
                    ->get();
        // echo $project_employe_datas;
        return view("Checkproject.show",["project_employe_datas" => $project_employe_datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today = Date("y-m-d"); 
        Project::where("pro_id",$id)->update(
            [
                "pro_e_time" => $today,
                "pro_close"  => "通過",
            ]
        );
        return redirect()->route("Checkproject.index");
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
        Project::where("pro_id",$id)->update(
            [
                "pro_close" => "不通過",
            ]
        );
        return redirect()->route("Checkproject.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('pro_id', '=', $id)->delete();
        return redirect()->route("Checkproject.index");
    }
}
