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

    <div class="Project-Box">
        <h1 class="text-center">專案查看管理</h1>
        <form action = "{{route("Project.index")}}" method="GET">
            <select name = "choose_time">
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
            <button type = "submit">送出</button>
        <form>
        <table id="Project" class="table table-striped table-bordered dt-responsive nowrap" style="margin: 0 !important;">
            
            <thead>
                <tr>
                    <th>專案名稱</th>
                    <th>專案內容</th>
                    <th>專案開始時間</th>
                    <th>專案結束時間</th>
                    <th>專案是否完成</th>
                    <th>專案負責人</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach($project_datas as $project_data)
                <tr>
                    <td>{{$project_data->pro_name}}</td>
                    <td>{{$project_data->pro_content}}</td>
                    <td>{{$project_data->pro_s_time }}</td>
                    <td>{{$project_data->pro_e_time }}</td>
                    <td>{{$project_data->pro_close }}</td>
                    <td>{{$project_data->emp_rel_name }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>