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
   
        <<div id="container">
            <div class="Vacancies-Box">
                <h1 class="text-center">專案查看管理</h1>
                <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>專案名稱</th>
                            <th>專案內容</th>
                            <th>專案開始時間</th>
                            <th>專案結束時間</th>
                            <th>專案內容</th>
                            <th>專案是否完成</th>
                            <th>專案負責人</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project_datas as $project_data)
                        <tr>
                            <td>{{$project_data->pro_name}}</td>
                            <td>{{$project_data->pro_content}}</td>
                            <td>{{$project_data->pro_s_time }}</td>
                            <td>{{$project_data->pro_e_time }}</td>
                            <td>{{$project_data->pro_close }}</td>
                            <td>{{$Vacancie->principal }}</td>          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>