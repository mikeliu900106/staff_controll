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

    <form method="post" action="{{route('Dayworkproject.store')}}">
        @csrf
        <div class="Box Daywork-Box">
            <h1>日常專案建立</h1>
            <div class="">
                <div class="mb-2">
                    <div class="from-group">
                        <label for="work_name">專案名稱：</label>
                        <select class="form-control mb-2" id="work_name" name="work_name">
                            @foreach($project_datas as $project_data)
                            <option value="{{$project_data->pro_name}}">{{$project_data->pro_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="start_time">開始時間：</label>
                            <input class="form-control" id="start_time" type="datetime-local" name="start_time">
                        </div>
                        <div class="col">
                            <label for="end_time">結束時間：</label>
                            <input class="form-control" id="end_time" type="datetime-local" name="end_time">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="work_talk">敘述</label>
                    <textarea class="form-control" name="work_talk" id="work_talk" rows="3"></textarea>
                </div>
                <div class="d-flex ">
                    <!-- justify-content-between -->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="day_work_type[]" value="設計" id="day_work_type[0]">
                        <label class="form-check-label" for="day_work_type[0]">設計</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="day_work_type[]" value="請照" id="day_work_type[1]">
                        <label class="form-check-label" for="day_work_type[1]">請照</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="day_work_type[]" value="製作招標書圖" id="day_work_type[2]">
                        <label class="form-check-label" for="day_work_type[2]">製作招標書圖</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="day_work_type[]" value="文件" id="day_work_type[3]">
                        <label class="form-check-label" for="day_work_type[3]">文件</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="day_work_type[]" value="施工監造" id="day_work_type[4]">
                        <label class="form-check-label" for="day_work_type[4]">施工監造</label>
                    </div>
                </div>
                <label for="day_work_type[5]">其他</label>
                <input class="form-control mb-3" type="text" name="day_work_type[]" id="day_work_type[5]" style="height: 40px;">

                <div class="">
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