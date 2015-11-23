@extends('layouts.public', ['bodyClasses' => 'page-error ' . $bodyClasses])

@section('content')

    <!-- Section Error begin -->
    <section id="error" class="">

            <header>
                @yield('error-header')
            </header>

            <article>
                @yield('error-body')
            </article>

    </section>
    <!-- Section Error end -->

@endsection
