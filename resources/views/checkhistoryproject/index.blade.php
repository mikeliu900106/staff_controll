<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent


    <div class="Box">
        <!-- 註冊資料輸入欄 -->

        <div id="container">
            <form action="{{route("Checkhistoryproject.index")}}" method="GET" id="form1">

                <div class="row mb-2" style="padding: 0 11px;">
                    <div class="col-sm-10 col-12 px-1 mb-1">
                        <select name="choose_project_name" class="form-select" aria-label="Default select example">
                            @foreach($project_names as $project_name)
                            <option value="{{$project_name->pro_name}}">{{$project_name->pro_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 col-12 px-1">
                        <button class="w-100 btn btn-primary" type="submit">送出</button>
                    </div>
                </div>
            </form>
            <div class="HistoryProject-Box">
                <h1 class="text-center">歷史專案查詢</h1>
                <table class="table table-striped table-bordered dt-responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th>專案名稱</th>
                            <th>專案內容</th>
                            <th>專案開始時間</th>
                            <th>專案結束時間</th>
                            <th>詳細資料</th>
                            <th>專案負責人</th>
                            <th>專案是否完成</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project_datas as $project_data)
                        <tr>
                            <td th="專案名稱">{{$project_data->pro_name}}</td>
                            <td th="專案內容">{{$project_data->pro_content }}</td>
                            <td th="專案開始時間">{{$project_data->pro_s_time }}</td>
                            @if($project_data->pro_e_time == "")
                            <td th="專案結束時間">專案尚未結束</td>
                            @else
                            <td th="專案結束時間">{{$project_data->pro_e_time}}</td>
                            @endif
                            <td><a href="{{route("Checkhistoryproject.show",$project_data->pro_id)}}">詳細資料</a></td>
                            <td th="專案負責人">{{$project_data->emp_rel_name }}</td>
                            <td th="專案是否完成">{{$project_data->pro_close }}</td>

                            < </tr>
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>