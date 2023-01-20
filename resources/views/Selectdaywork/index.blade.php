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
    <div class="Box SelectDaywork-Box">
        <h1>日常工作查詢</h1>
        <div id="container">
            <form method="get" action="{{route('Selectdaywork.index')}}">
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
                <div class="col-sm-2 col-12 px-1">
                    <button class="w-100 btn btn-primary" type="submit">送出</button>
                </div>
            </form>
            <div class="">
                <table class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>日常工作名稱</th>
                            <th>日常工作起始時間</th>
                            <th>日常工作結束時間</th>
                            <th>日常工作內容</th>
                            <th>日常工作型態</th>
                            <th>專案型態</th>
                            <th>處理時間</th>
                            <th>刪除</th>
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
                                <form action="{{route("Selectdaywork.destroy",$daywork_data->work_id)}}" method = "post">
                                    @csrf
                                    @method('DELETE')  
                                    <td><button type = "submit"class="btn btn-danger">刪除</button></td>
                                </form>    
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