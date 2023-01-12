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
   
        <form method="post" action="{{route('Daywork.store')}}">
            @csrf
            <div class="Account-Box">
                <div class="Title">
                    <h1>日誌撰寫</h1>
                </div>
                <!-- 註冊資料輸入欄 -->
                <div class="Input-Section">
                    <input class="Account-Text" type="text" name="work_name" placeholder="日常工作名稱">
                    <input class="Account-Text" type="datetime-local" name="start_time">
                    <input class="Account-Text" type= "datetime-local" name="end_time" >
                    <div>
                        <textarea id="work_talk" name="work_talk" rows="5" cols="27"></textarea>
                        <label for="work_talk">敘述</label>
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