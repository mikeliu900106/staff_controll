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
   
        <form method="post" action="{{route('Dayworkproject.store')}}">
            @csrf
            <div class="Account-Box">
                <div class="Title">
                    <h1>日誌撰寫</h1>
                </div>
                <!-- 註冊資料輸入欄 -->
                <div class="Input-Section">
                    <select name = "work_name">
                        @foreach($project_datas as $project_data)
                            <option value="{{$project_data->pro_name}}">{{$project_data->pro_name}}</option>
                            
                        @endforeach
                    </select>
                        <input class="Account-Text" type="datetime-local" name="start_time">
                    <input class="Account-Text" type= "datetime-local" name="end_time" >
                    <div>
                        <textarea id="work_talk" name="work_talk" rows="5" cols="27"></textarea>
                        <label for="work_talk">敘述</label>
                    </div>
                    <div>
                        <input type="checkbox" name="day_work_type[]" value = "設計">
                        <label for="day_work_type[]">設計</label>
                        <input type="checkbox" name="day_work_type[]" value = "請照">
                        <label for="day_work_type[]">請照</label>
                        <input type="checkbox" name="day_work_type[]" value = "製作招標書圖">
                        <label for="day_work_type[]">製作招標書圖</label>
                        <input type="checkbox" name="day_work_type[]" value = "文件">
                        <label for="day_work_type[]">文件</label>
                        <input type="checkbox" name="day_work_type[]" value = "施工監造">
                        <label for="day_work_type[]">施工監造</label>
                        <input type="text" name="day_work_type[]" >
                        <label for="day_work_type[]">其他</label>
                    </div>
                <!-- 登入 提交 -->
                <div class="Submit-Section">
                    <input class="Submit-Button" type="submit" value="提交" />
                </div>
                <!-- 回登入 回首頁 -->
                <a href="{{route('Signup.index')}}"><img src="/img/return.png" class="ReturnLogo"></a>
                <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>

            </div>
        </form>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>