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
            <a class="navbar-brand" href="{{asset('/')}}">劉昌煥事務所</a>
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
                            <a class="dropdown-item" href="{{route('Daywork.index')}}">日誌撰寫</a>
                            <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </li>
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

                <div class="form-inline my-2 my-lg-0">
                    <a href="{{route('Login.index')}}" class="btn btn-outline-primary my-2 my-sm-0" type="submit">登入</a>
                </div>
            </div>
        </div>
    </nav>
    </div>
    @show
    <!-- <div class="title">
        <h1 class="word_main">practice</h1>
        <h1 class="word">change your life!</h1>
    </div> -->

    <!-- Additional required wrapper -->
    <div class="swiper mySwiper" style="position: absolute;">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/image/01.jpg"></div>
            <div class="swiper-slide"><img src="/image/02.jpg"></div>
            <div class="swiper-slide"><img src="/image/03.jpg"></div>
            <!-- <div class="swiper-slide"><img src="/image/04.jpg"></div>    -->
        </div>
        <!-- navigation buttons -->
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