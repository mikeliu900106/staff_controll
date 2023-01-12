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

    <form method="get" action="{{route('Checkdaywork.index')}}">
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>日誌查看</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <select name ="choose_emp_id">
                @foreach($employe_datas as $employe_data)
                    <option value = "{{$employe_data->emp_id}}">{{ $employe_data->emp_rel_name }}</option>
                @endforeach
            </select>
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div>
           
            <div id="container">
                <div class="Vacancies-Box">
                    <h1 class="text-center">查看日誌</h1>
                    <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>工作名稱</th>
                                <th>工作起始時間</th>
                                <th>工作結束時間</th>
                                <th>工作內容</th>
                                <th>工作型態</th>
                                <th>專案型態</th>
                                <th>刪除</th>
  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daywork_datas as $daywork_data)
                            <tr>
                                <td>{{$daywork_data->work_name}}</td>
                                <td>{{$daywork_data->work_start_time}}</td>
                                <td>{{$daywork_data->work_end_time }}</td>
                                <td>{{$daywork_data->work_talk }}</td>
                                <td>{{$daywork_data->work_type }}</td>   
                                <td>{{$daywork_data->pro_type }}</td> 
                                <form method ="post"action = "{{route("Checkdaywork.destroy",$daywork_data->work_id)}}">
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
    </form>
    
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>