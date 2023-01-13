<html>

<head>
    @section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
        {{-- <link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
        <script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
        <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
        {{-- <script type="text/javascript" src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset("/css/app.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("/css/table.css")}}">
        <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.min.css")}}" /> --}}
        <!-- <link rel="stylesheet" href="{{asset("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css")}}"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css" />
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
    </head>
    @show
</head>

<body>
    @section('nav')
    <nav class="navbar navbar-expand-md" id="nav">
        <a class="navbar-brand logo col-2 text-center" href="{{url('/')}}">劉昌煥事務所</a>
        <!-- RWD -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDropdown" style="color: white">
            <span class="navbar-toggler-icon toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navDropdown">
            <ul class="navbar-nav col text-center">
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">職員</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('Project.index')}}">專案查看</a></li>
                        <li><a class="dropdown-item" href="{{route('Daywork.index')}}">日常工作撰寫</a></li>
                        <li><a class="dropdown-item" href="{{route('Dayworkproject.index')}}">日常專案撰寫</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown col-1">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">老闆</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="{{route('Checkproject.index')}}">專案檢查</a></li>
                        <li><a class="dropdown-item" href="{{route('Checkhistoryproject.index')}}">歷史專案</a></li>
                        <li><a class="dropdown-item" href="{{route('Checkdaywork.index')}}">日誌檢查</a></li>
                        <li><a class="dropdown-item" href="{{route('Checkemploye.index')}}">員工檢查</a></li>
                        <li><a class="dropdown-item" href="{{route('Checkemploye.index')}}">資料統計</a></li>
                    </ul>
                </li>
                
                <div class="col"></div>

                <li class="nav-item col-2 account">
                    <a class="nav-link" href="{{route('Login.index')}}">'登入'<i class="bi bi-person"></i></a>
                    <a class="nav-link" href="{{route('Signup.index')}}">'註冊'<i class="bi bi-person"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    @show
    <div class="main">
        @section('content')
        @show
    </div>
    </div class="footer">
    @section('footer')
    @show
    </div>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/index.js")}}"></script>
</body>

</html>