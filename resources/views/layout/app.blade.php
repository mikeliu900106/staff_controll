<html>

<head>
    @section('head')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
        <link rel="stylesheet" type="text/css" href="{{asset("/css/app.css")}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />


    </head>
    @show
</head>

<body>
    @section('nav')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{asset('/')}}">劉昌煥事務所</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if(session()->get("level")==1)
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown"> -->

                    <li class="navbar-li"><a class="btn btn-link" href="{{route('Daywork.index')}}">日常工作建立</a></li>
                    <li class="navbar-li"><a class="btn btn-link" href="{{route('Dayworkproject.index')}}">日常專案建立</a></li>
                    <li class="navbar-li"><a class="btn btn-link" href="{{route('Selectdaywork.index')}}">日常工作查詢</a></li>
                    {{-- <li class="navbar-li"><a class="btn btn-link" href="{{route('Selectdaywork.create')}}">日常工作更新</a></li> --}}
                    <li class="navbar-li"><a class="btn btn-link" href="{{route('Project.index')}}">專案查詢</a></li> 
                    <!-- </div> -->
                    @endif
                    @if(session()->get("level")>=2)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            職員
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           
                            <a class="dropdown-item" href="{{route('Daywork.index')}}">日常工作建立</a>
                            <a class="dropdown-item" href="{{route('Dayworkproject.index')}}">日常專案建立</a>
                            <a class="dropdown-item" href="{{route('Selectdaywork.index')}}">日常工作查詢</a>
                            {{-- <a class="dropdown-item" href="{{route('Selectdaywork.create')}}">日常工作更新</a> --}}
                            <a class="dropdown-item" href="{{route('Project.index')}}">專案查詢</a>

                            <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            管理專案
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Checkproject.create')}}">專案建立</a>
                            <a class="dropdown-item" href="{{route('Projectupdate.index')}}">專案更新</a>
                            <a class="dropdown-item" href="{{route('Checkproject.index')}}">專案查詢</a>
                            <a class="dropdown-item" href="{{route('Checkhistoryproject.index')}}">歷史專案查詢</a>

                            {{-- <a class="dropdown-item" href="{{route('Checkemploye.index')}}">資料統計</a> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            管理日常工作
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Checkdayworkproject.index')}}">日常工作查詢</a>

                            {{-- <a class="dropdown-item" href="{{route('Checkemploye.index')}}">資料統計</a> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            管理員工
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Signup.index')}}">員工建立</a>
                            <a class="dropdown-item" href="{{route('Checkemploye.index')}}">員工查詢</a>
                            {{-- <a class="dropdown-item" href="{{route('Checkemploye.index')}}">資料統計</a> --}}
                        </div>
                    </li>
                    @endif
                    @if(session()->has("name"))
                    <li class="nav-item dropdown ml-lg-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            您好 {{session()->get("name")}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Signup.create')}}">更改帳號密碼</a>
                            <a class="dropdown-item" href="{{route('Login.create')}}">登出</a>
                        </div>
                    </li>
                </ul>
                @else
                <div class="form-inline ml-lg-auto">
                    <a href="{{route('Login.index')}}" class="btn btn-outline-info my-2 my-sm-0" type="submit">登入</a>
                </div>
                @endif
            </div>
        </div>
    </nav>
    </div>
    @show

    <div class="swiper mySwiper" style="position: absolute;">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/image/01.jpg"></div>
            <div class="swiper-slide"><img src="/image/02.jpg"></div>
            <div class="swiper-slide"><img src="/image/03.jpg"></div>
            <div class="swiper-slide"><img src="/image/04.jpg"></div>
            <div class="swiper-slide"><img src="/image/05.jpg"></div>
            <div class="swiper-slide"><img src="/image/06.jpg"></div>
        </div>

        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div> -->
    </div>
    <!-- pagination -->
    <!-- <div class="swiper-pagination"></div> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            rewind: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <div class="main">
        <div class="container h-100 w-100 py-5">
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