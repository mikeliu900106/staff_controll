<html>

<head>
    @section('head')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
        <link rel="stylesheet" type="text/css" href="{{asset("/css/app.css")}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    @show
</head>

<body>
    @section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">劉昌煥事務所</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            職員
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Project.index')}}">專案查看</a>
                            <a class="dropdown-item" href="{{route('Daywork.index')}}">日常工作撰寫</a>
                            <a class="dropdown-item" href="{{route('Dayworkproject.index')}}">日常 專案撰寫</a>
                            <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </li>
                @if(session()->get("username")>=2)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                老闆
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('Checkproject.index')}}">專案檢查</a>
                                <a class="dropdown-item" href="{{route('Checkhistoryproject.index')}}">歷史專案</a>
                                <a class="dropdown-item" href="{{route('Checkdaywork.index')}}">日誌檢查</a>
                                <a class="dropdown-item" href="{{route('Checkemploye.index')}}">員工檢查</a>
                                <a class="dropdown-item" href="{{route('Checkemploye.index')}}">資料統計</a>
                            </div>
                        </li>
                    </ul>
                @else

                @endif
                @if(session()->has("username"))
                    <li class="nav-item dropdown">
                        <div class="form-inline my-2 my-lg-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                歡迎員工{{session()->get("username")}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('Login.create')}}">登出</a>
                                <a class="dropdown-item" href="{{route('Signup.update',session()->get("emp_id"))}}">更改帳號密碼</a>
                              
                            </div>
                        </div>
                    </li>
                @else
                    <div class="form-inline my-2 my-lg-0">
                        <a href="{{route('Login.index')}}" class="btn btn-outline-primary my-2 my-sm-0" type="submit">登入</a>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    </div>
    @show
    <div class="main">
        <div class="container">
            @section('content')
            @show
        </div>
    </div>
    </div class="footer">
    @section('footer')
    @show
    </div>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/index.js")}}"></script>
</body>

</html>