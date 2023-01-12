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
    <form method="post" action="{{route('Checkproject.store')}}">
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>專案新增</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                <div>
                    <input class="Account-Text" type="text" name="pro_name" placeholder="專案名稱">
                    <label for="pro_name">專案名稱</label>
                </div>
                <div>
                    <input class="Account-Text" type="datetime-local" name="create_time">
                    <label for="create_time">專案開始時間</label>
                </div>
                <div>
                    <textarea id="pro_content" name="pro_content" rows="5" cols="27"></textarea>
                    <label for="pro_content">專案內容</label>
                </div>
                <select name = "principal">
                    @foreach($employe_datas as $employe_data)
                        <option value = "{{$employe_data->emp_id}}">{{$employe_data->emp_rel_name}}</option>
                    @endforeach
                </select>
                <label for="principal">主要負責人</label>
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