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

    <form method="post" action="{{route('Daywork.update',$work_id)}}">
        @csrf
        @method('PUT')
        <div class="Box">
            <h1>日常工作更新</h1>
            <div class="">
                <label for="work_name">日常工作名稱</label>
                <input class="form-control mb-3" type="text" name="work_name" id="work_name" placeholder="">
                <div class="row mb-2">
                    <div class="col">
                        <label for="start_time">開始時間：</label>
                        <input class="form-control" id="start_time" type="datetime-local" name="start_time">
                    </div>
                    <div class="col">
                        <label for="end_time">結束時間：</label>
                        <input class="form-control" id="end_time" type="datetime-local" name="end_time">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="work_talk">敘述</label>
                    <textarea class="form-control" name="work_talk" id="work_talk" rows="3"></textarea>
                </div>
                <div class="mt-3">
                    <input class="btn btn-primary w-100" type="submit" value="提交" />
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