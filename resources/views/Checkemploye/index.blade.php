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
        <h1>查看員工</h1>

        <div class="CheckEmp-Box">
            <table class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>員工名稱</th>
                        <th>員工帳號</th>
                        <th>員工密碼</th>
                        <th>員工電話</th>
                        <th>員工等級</th>
                        <th>編輯</th>
                        <th>刪除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employe_datas as $employe_data)
                    <tr style="margin-bottom: 10px;">
                        <td th="員工名稱">{{$employe_data->emp_rel_name}}</td>
                        <td th="員工帳號">{{$employe_data->emp_username}}</td>
                        <td th="員工密碼">{{$employe_data->emp_pass }}</td>
                        <td th="員工電話">{{$employe_data->emp_tel}}</td>
                        <td th="員工等級">{{$employe_data->level}}</td>
                        <td th="編輯"><a class="btn btn-success" href="{{route("Checkemploye.create",['emp_id'=>$employe_data])}}">更新</a></td>
                        <form method="post" action="{{route("Checkemploye.destroy",$employe_data->emp_id)}}">
                            @csrf
                            @method('DELETE')
                            <td th="刪除"><button class="btn btn-danger" type="submit">Delete</button></td>
                        </form>
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