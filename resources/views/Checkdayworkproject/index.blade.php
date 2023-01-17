<!DOCTYPE html>
<html>
@extends('layout.app')
{{-- @section('head')
@parent
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection --}}

<body>
    {{-- @section('nav')
    @parent
    @endsection --}}

    @section('content')
    @parent

    <form method="get" action="{{route('Checkdayworkproject.index')}}">
        @csrf
        <div class="Box">
            <div class="Title">
                <h1>日誌專案查看</h1>
            </div>
            <div>選擇查看員工</div>
            <div class="row mb-2" style="padding: 0 11px;">
                <div class="col-sm-5 col-12 px-1 mb-1">
                    <select class="form-select" name="choose_time">
                        <option value="1" disabled selected>請選擇日期範圍</option>
                        <option value="1">一天內</option>
                        <option value="7">一個禮拜內</option>
                        <option value="14">兩個禮拜內</option>
                        <option value="31">一個月內</option>
                        <option value="61">兩個月內</option>
                        <option value="91">三個月內</option>
                        <option value="121">四個月內</option>
                        <option value="151">五個月內</option>
                        <option value="365">一年內</option>
                        <option value="730">二年內</option>
                        <option value="1095">三年內</option>
                        <option value="1460">五年內</option>
                    </select>
                </div>
                <div class="col-sm-5 col-12 px-1 mb-1">
                    <select class="form-select" name="choose_emp_id">
                        <option value="" selected disabled>請選擇員工</option>
                        @foreach($employe_datas as $employe_data)
                        <option value="{{$employe_data->emp_id}}">{{ $employe_data->emp_rel_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 col-12 px-1">
                    <button class="w-100 btn btn-primary" type="submit">送出</button>
                </div>
            </div>


            <!-- <select name="choose_emp_id">
                <option value="無" selected disabled>請選擇員工</option>
                @foreach($employe_datas as $employe_data)
                <option value="{{$employe_data->emp_id}}">{{ $employe_data->emp_rel_name }}</option>
                @endforeach
            </select>
            <select name="choose_time">
                <option value="1" disabled selected>請選擇日期範圍</option>
                <option value="1">一天內</option>
                <option value="7">一個禮拜內</option>
                <option value="14">兩個禮拜內</option>
                <option value="31">一個月內</option>
                <option value="61">兩個月內</option>
                <option value="91">三個月內</option>
                <option value="121">四個月內</option>
                <option value="151">五個月內</option>
                <option value="365">一年內</option>
                <option value="730">二年內</option>
                <option value="1095">三年內</option>
                <option value="1460">五年內</option>
            </select> -->
            <!-- {{-- <input class=" " type="datetime-local" name="choose_start_time">
            <input class=" " type="datetime-local" name="choose_end_time"> --}}
            <div class="Submit-Section">
                <input class="Submit-Button" type="submit" value="提交" />
            </div> -->
    </form>
    <div id="container">
        <div class="">
            <!-- <h1 class="text-center">查看日誌</h1> -->
            <table id="" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>工作名稱</th>
                        <th>工作起始時間</th>
                        <th>工作結束時間</th>
                        <th>工作內容</th>
                        <th>工作型態</th>
                        <th>專案型態</th>
                        <th>總共處理時間</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($daywork_datas as $daywork_data)
                    <tr>
                        <td>{{$daywork_data->work_name}}</td>
                        <td>{{$daywork_data->work_start_time}}</td>
                        <td>{{$daywork_data->work_end_time }}</td>
                        <td>{{$daywork_data->work_talk }}</td>
                        <td>{{$daywork_data->work_type }}</td>
                        <td>{{$daywork_data->pro_type }}</td>
                        <td>{{$daywork_data->total_day."天".$daywork_data->total_hour."小時".$daywork_data->total_minute."分鐘" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>


    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>