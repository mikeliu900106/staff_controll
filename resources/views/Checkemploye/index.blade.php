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

   
        <div class="Account-Box">
            <div class="Title">
                <h1>查看員工</h1>
            </div>
            <!-- 註冊資料輸入欄 -->

           
            <div id="container">
                <div class="Vacancies-Box">
                    <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
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
                            <tr>
                                <td>{{$employe_data->emp_rel_name}}</td>
                                <td>{{$employe_data->emp_username}}</td>
                                <td>{{$employe_data->emp_pass }}</td>
                                <td>{{$employe_data->emp_tel}}</td>
                                <td>{{$employe_data->level}}</td>   
                                <td><a href = "{{route("Checkemploye.create")}}">更新</a></td>  
                                <form method ="post"action = "{{route("Checkemploye.destroy",$employe_data->emp_id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <td><button class="btn btn-danger" type="submit" >Delete</button></td>
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