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
   
    <a href ="{{route("Daywork.create")}}">每日工作日誌</a>
    @endsection

    @section('footer')
    @parent
    @endsection

</body>

</html>