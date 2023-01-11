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
   
    <form action="{{ route('Login.store')}}" method="POST">
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>登入</h1>
            </div>
            <div class="Input-Section">
                <div class="form-group w-100">
                    <label for="username">帳號</label>
                    <div class="Input-group w-100">
                        <input class="Account-Test" type="text" placeholder="username" name="username">
                        <i class="bi bi-person"></i>
                    </div>
                    <span></span>
                </div>
                <div class="form-group w-100">
                    <label for="password">密碼</label>
                    <div class="Input-group w-100">
                        <input class="Account-Test" type="password" placeholder="password" name="password" />
                        <i class="bi bi-lock"></i>
                    </div>
                    <!-- <span class="text-muted">至少8個字元</span> -->
                </div>
                <div class="Help-Section">
                    <a href="{{route('Signup.index')}}" style="margin-right: 5px;">註冊</a>
                    <a href="forgetPW.php">忘記密碼?</a>
                </div>
                <div style="height: 5em"></div>
            </div>
            <div class="Submit-Section">
                <button class="Submit-Button" type="submit" value="提交" id='login-submit'>提交</button>
            </div>
            <a href="{{url('/')}}"><img src="/img/home.png" class="HomeLogo"></a>
        </div>
    </form>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>