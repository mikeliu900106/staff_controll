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
    <a href="{{route("Checkproject.create")}}">新增專案</a>
    <form method="get" action="{{route('Checkhistoryproject.index')}}">
        @csrf
        <div class="Input-Section">
            <input class="Account-Text" type="date" name="choose_start_time">
            <input class="Account-Text" type="date" name="choose_end_time">
            <!-- 登入 提交 -->
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>

    </form>
    <div class="Box">
        <!-- 註冊資料輸入欄 -->

        <div id="container">
            <div class="HistoryProject-Box">
                <h1 class="text-center">查看歷史專案</h1>
                <table class="table table-striped table-bordered dt-responsive nowrap text-center">
                    <thead>
                        <tr>
                            <th>專案名稱</th>
                            <th>專案內容</th>
                            <th>專案開始時間</th>
                            <th>專案結束時間</th>
                            <th>專案是否完成</th>
                            <th>專案負責人</th>
                            <th>刪除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project_datas as $project_data)
                        <tr>
                            <td th="專案名稱">{{$project_data->pro_name}}</td>
                            <td th="專案內容">{{$project_data->pro_content }}</td>
                            <td th="專案開始時間">{{$project_data->pro_s_time }}</td>
                            @if($project_data->pro_e_time == null)
                            <td th="專案結束時間">專案尚未結束</td>
                            @else
                            {{$project_data->pro_e_time}}
                            @endif
                            <td th="專案是否完成">{{$project_data->pro_close }}</td>
                            <td th="專案負責人">{{$project_data->emp_rel_name }}</td>

                            <form method="post" action="{{route("Checkhistoryproject.destroy",$project_data->pro_id)}}">
                                @method('DELETE')
                                @csrf
                                <td th="刪除">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </td>
                            </form>

                        </tr>
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