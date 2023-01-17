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
        <form method="post" action="{{route('Signup.store')}}">
            @csrf
            <div class="Account-Box">
                <div class="Title">
                    <h1>新增員工</h1>
                </div>
                <div class="Input-Section">
                    <div class="form-group">
                        <label for="username" class="w-100">帳號
                            <div class="Input-group w-100">
                                <i class="bi bi-person"></i>
                                <input class="Account-Text" type="text" id="username" name="username" placeholder="請輸入帳號">
                            </div>
                        </label>
                        <label for="password" class="w-100">密碼
                            <div class="Input-group w-100">
                                <input class="Account-Text" type="password" id="password" name="password" placeholder="請輸入密碼">
                            </div>
                        </label>
                        <label for="real_name" class="w-100">姓名
                            <div class="Input-group w-100">
                                <input class="Account-Text" type="text" id="real_name" name="real_name" placeholder="請輸入姓名">
                            </div>
                        </label>
                        <label for="number" class="w-100">電話
                            <div class="Input-group w-100">
                                <input class="Account-Text" type="text" id="number" name="number" placeholder="請輸入電話號碼">
                            </div>
                        </label>
                        <div>等級</div>
                        <div class="col d-flex flex-column justify-content-sm-around align-items-center flex-wrap flex-sm-row">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="level1" name="level" value="1" id="inlineCheckbox1">
                                <label for="level1" class="form-check-label">等級一</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="level2" name="level" value="2" id="inlineCheckbox2">
                                <label for="level2" class="form-check-label">等級二</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="level3" name="level" value="3" id="inlineCheckbox3">
                                <label for="level3" class="form-check-label">等級三</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Submit-Section mt-3">
                    <input class="btn btn-primary w-100 Submit-Button" type="submit" value="提交" />
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