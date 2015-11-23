@extends('layouts.master', ['bodyClasses' => 'page page-public has-section-slides ' . $bodyClasses])

@section('header')
    @include('includes/public/header')
@endsection

@section('main')

    <div class="container">

        <!-- Content begin -->
        <div id="content">
            @yield('content')
        </div>
        <!-- Content end -->

    </div><!-- /.container -->

@endsection
