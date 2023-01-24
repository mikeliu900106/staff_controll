<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
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
                    // targets: [-2],
                    // responsivePriority: 2,
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
    {{-- @section('nav')
    @parent
    @endsection --}}

    @section('content')
    @parent

    <div class="Box Project-Box">
            <div class="Title">
                <h1>日誌專案查看</h1>
            </div>
        <div id="container">
            <!-- <h1 class="text-center">查看日誌</h1> -->
            <table id="Project" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>

                        <th>工作名稱</th>
                        <th>工作起始時間</th>
                        <th>工作結束時間</th>
                        <th>工作內容</th>
                        <th>工作型態</th>
                        <th>專案型態</th>
                        <th>處理時間</th>
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
                        <td>{{$daywork_data->pro_type }}</td>
                        <td>{{$daywork_data->total_day."天".$daywork_data->total_hour."小時".$daywork_data->total_minute."分鐘" }}</td>
                        <td><a href ="{{route("Daywork.edit",$daywork_data->work_id)}}">更新</a></td>
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