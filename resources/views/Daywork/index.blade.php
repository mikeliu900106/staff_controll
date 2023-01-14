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
    <a href="{{route("Daywork.create")}}">新增日常工作日誌</a>
    <br>

    <form method="get" action="{{route('Daywork.index')}}">
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>日誌查看</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                <input class="Account-Text" type="datetime-local" name="choose_start_time">
                <input class="Account-Text" type="datetime-local" name="choose_end_time">
                <!-- 登入 提交 -->
                <div class="Submit-Section">
                    <input class="Submit-Button" type="submit" value="提交" />
                </div>

                <div id="container">
                    <div class="Vacancies-Box">
                        <h1 class="text-center">查看日誌</h1>
                        <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>日常工作名稱</th>
                                    <th>日常工作起始時間</th>
                                    <th>日常工作結束時間</th>
                                    <th>日常工作內容</th>
                                    <th>日常工作型態</th>
                                    <th>專案型態</th>
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
                                    @if(!$daywork_data->pro_type == null)
                                    <td>{{$daywork_data->pro_type }}</td>
                                    @else
                                    <td>日常工作沒有專案型態</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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