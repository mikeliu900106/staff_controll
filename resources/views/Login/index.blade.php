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
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <form action="{{ route('Login.store')}}" method="POST" style="width: 600px">
            @csrf
            <div class="Account-Box">
                <div class="Title">
                    <h1>登入</h1>
                </div>
                <div class="Input-Section">
                    <div class="form-group w-100">
                        <label for="username" class="w-100">帳號
                            <div class="Input-group w-100">
                                <i class="bi bi-person"></i>
                                <input class="Account-Text" type="text" placeholder="Username" name="username">
                            </div>
                        </label>
                    </div>
                    <div class="form-group w-100 ">
                        <label for="password" class="w-100">密碼
                            <div class="Input-group w-100">
                                <i class="bi bi-lock"></i>
                                <input class="Account-Text" type="password" placeholder="Password" name="password" />
                            </div>
                        </label>
                    </div>
                    <div class="Help-Section">
                        <!-- <a class="btn btn-link" href="{{route('Signup.index')}}">註冊</a> -->
                        <!-- <a class="btn btn-link ml-auto" href="forgetPW.php">忘記密碼?</a> -->
                    </div>
                </div>
                <div style="flex-grow: 1;"></div>
                <div class="Submit-Section">
                    <button class="btn btn-primary Submit-Button w-100" type="submit" id='login-submit'>登入</button>
                </div>
            </div>
        </form>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>