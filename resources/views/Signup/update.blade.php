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
   
        <form method="post" action="{{route('Signup.update',$emp_id)}}">
            @csrf
            @method("PUT")
            <div class="Account-Box">
                <div class="Title">
                    <h1>員工註冊</h1>
                </div>
                <!-- 註冊資料輸入欄 -->
                <div class="Input-Section">
               
                    <input class="Account-Text" type="text" name="username" placeholder="請輸入帳號">
                    <input class="Account-Text" type="password" name="password" placeholder="請輸入密碼">
                    <input class="Account-Text" type="text" name="real_name" placeholder="請輸入真名">
                    <input class="Account-Text" type="text" name="number" placeholder="請輸入電話號碼">
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