<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
@parent
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

<body>
    @section('nav')
    @parent
    @endsection

    @section('content')
    @parent

    <div class="container d-flex justify-content-center">
        <img src="{{asset('image/constructionWorker1.png')}}" alt="" style="width: 80%;">
    </div>

    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>