<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        let V = $('#Project').DataTable({
            // "searching": false,
            // "paging": false,
            "responsive": true,
            "scrollX": true,
            "columnDefs": [{
                    targets: [0], // 第一欄 0開始, -1倒數
                    // width: "100px",
                    responsivePriority: 1,
                    createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                        // $(td).css('width', '30%') //可寫其他設定
                    },
                },
                {
                    targets: [-2],
                    responsivePriority: 2,
                },
                {
                    targets: "_all", // 全部欄
                    className: 'text-center' // className: 'text-left text-info'
                },
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/zh_Hant.json"
            }
        });
        window.onresize = function() {
            V.columns.adjust()
        }
        let Project = document.getElementById('Project')
        Project.addEventListener('click', function() {
            V.columns.adjust()
        })
    });
</script>
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent
    @csrf
    <div class="Project-Box">
        <div id="container">
            <div class="position-relative">
                <h1 class="text-center">專案查詢</h1>

                <form action="{{route("Checkproject.index")}}" method="GET">
                    <div class="row mb-2" style="padding: 0 11px;">
                        <div class="col-sm-10 col-12 px-1 mb-1">
                            <select name="choose_project_name" class="form-select" aria-label="Default select example">
                                @foreach($project_names as $project_name)
                                <option value="{{$project_name->pro_name}}">{{$project_name->pro_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2 col-12 px-1">
                            <button class="w-100 btn btn-primary" type="submit">送出</button>
                        </div>
                    </div>
                </form>

                <table id="Project" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr class="text-center">
                            <th>專案名稱</th>
                            <th>專案內容</th>
                            <th>專案開始時間</th>
                            <th>專案結束時間</th>
                            <th>詳細資料</th>
                            <th>專案負責人</th>
                            <th>專案是否完成</th>
                            <th>編輯</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project_datas as $project_data)
                        <tr class="text-center">
                            <td>{{$project_data->pro_name}}</td>
                            <td>{{$project_data->pro_content }}</td>
                            <td>{{$project_data->pro_s_time }}</td>
                            @if($project_data->pro_e_time == null)
                            <td>專案尚未結束</td>
                            @else
                            <td>{{$project_data->pro_e_time}}</td>
                            @endif
                            <td><a href="{{route("Checkproject.show",$project_data->pro_id)}}">詳細資料</a></td>
                            <td>{{$project_data->emp_rel_name }}</td>
                            <td>{{$project_data->pro_close }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route("Checkproject.edit",$project_data->pro_id)}}">通過</a> <a class="btn btn-warning" href="{{route("Checkproject.update",$project_data->pro_id)}}">不通過</a>
                            </td>

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
<script>
    let form = document.getElementsByTagName('form')
    console.log(form)
    // document.body.appendChild(form)
    // console.log(123)
</script>

</html>