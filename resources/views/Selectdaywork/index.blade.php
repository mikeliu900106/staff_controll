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
        @csrf
        <div class="Account-Box">
            <div class="Title">
                <h1>日常工作查詢</h1>
            </div>
            <!-- 註冊資料輸入欄 -->
            <div class="Input-Section">
                </div>

                <div id="container">
                    <div class="Vacancies-Box">
                        <table id="Vacancies" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>日常工作名稱</th>
                                    <th>日常工作起始時間</th>
                                    <th>日常工作結束時間</th>
                                    <th>日常工作內容</th>
                                    <th>日常工作型態</th>
                                    <th>專案型態</th>
                                    <th>耗時時間</th>
                                    <th>更新</th>
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
                                    <td>{{$daywork_data->total_day."天".$daywork_data->total_hour."小時".$daywork_data->total_minute."分鐘" }}</td>
                                    <td><a href =""></a></td>
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