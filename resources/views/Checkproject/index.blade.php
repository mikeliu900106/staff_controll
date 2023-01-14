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
    // $(document).ready(function() {
    //     $('#Project').DataTable();
    // });
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
                    targets: [-4],
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
                <h1 class="text-center">專案管理</h1>
                <a class="btn btn-link text-decoration-none" href="{{route('Checkproject.create')}}" style="position:absolute; right: 0; top: 0;">新增專案</a>
                <table id="Project" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>專案名稱</th>
                            <th>專案內容</th>
                            <th>專案開始時間</th>
                            <th>專案結束時間</th>
                            <th>專案是否完成</th>
                            <th>專案負責人</th>
                            <th>編輯</th>
                            <th>刪除</th </tr>
                    </thead>
                    <tbody>
                        @foreach($project_datas as $project_data)
                        <tr>
                            <td>{{$project_data->pro_name}}</td>
                            <td>{{$project_data->pro_content }}</td>
                            <td>{{$project_data->pro_s_time }}</td>
                            @if($project_data->pro_e_time == null)
                            <td>專案尚未結束</td>
                            @else
                            {{$project_data->pro_e_time}}
                            @endif
                            <td>{{$project_data->pro_close }}</td>
                            <td>{{$project_data->emp_rel_name }}</td>
                            <td>
                                <a class="btn btn-success" href="{{route("Checkproject.edit",$project_data->pro_id)}}">通過</a> <a class="btn btn-warning" href="{{route("Checkproject.show",$project_data->pro_id)}}">不通過</a>
                            </td>
                            <form action="{{route("Checkproject.destroy",$project_data->pro_id)}}">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </td>
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