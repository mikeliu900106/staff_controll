<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent
    <form method="post" action="{{route('Checkproject.store')}}">
        @csrf
        <div class="Box">
            <h1>專案新增</h1>
            <div class="">

                <label for="pro_name">專案名稱</label>
                <select name="pro_name">
                    @foreach ($project_datas as $project_data)
                        <option value = "{{$project_data->}}"></option>
                    @endforeach
                </select>
                <label for="create_time">專案開始時間</label>
                <input class="form-control" id="create_time" type="datetime-local" name="create_time">

                <div class="form-group mb-2">
                    <label for="pro_content">專案內容</label>
                    <textarea class="form-control" name="pro_content" id="pro_content" rows="3"></textarea>
                </div>

                <label for="principal">主要負責人</label>
                <select class="form-control mb-2" id="principal" name="principal">
                    @foreach($employe_datas as $employe_data)
                    <option value="{{$employe_data->emp_id}}">{{$employe_data->emp_rel_name}}</option>
                    @endforeach
                </select>
                <div class="mt-3">
                    <input class="btn btn-primary w-100" type="submit" value="提交" />
                </div>
            </div>
    </form>

    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>