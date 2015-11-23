@extends('layouts.console', ['bodyClasses' => 'page-console-dashboard has-grid'])

@section('main')
    <!-- Content begin -->
    <article id="content">

        <!-- Grid begin -->
        {!! Form::open(array('route' => 'resources.widgets.update', 'method' => 'PUT', 'class' => '')) !!}
        <div id="grid-container">
            <div id="grid" class="grid-stack" data-gs-animate="true" data-widget-store-url="{{ route('resources.widgets.update') }}">

                @foreach ($widgets as $widget)
                    @include('partials.widgets.' . $widget->getType())
                @endforeach

            </div>
        </div>
        {!! Form::close() !!}
        <!-- Grid end -->

        @include('partials.widgets.source-widgets')

        <!-- Delete Widgets Form begin -->
        {!! Form::open(array('route' => ['resources.widgets.destroy', ''], 'method' => 'DELETE', 'class' => 'hidden', 'id' => 'delete-widgets-form')) !!}
        {!! Form::close() !!}
        <!-- Delete Widgets Form end -->

    </article>
    <!-- Content end -->

    <!-- Bottom Bar begin -->
    <div id="bottom-bar">
        <ul class="list-inline">
            <li><a class="add-widget-button" data-widget-type="mail" href="#" title="Add Mail Feed"><i class="fa fa-envelope"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="facebook" href="#" title="Add Facebook Feed"><i class="fa fa-facebook"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="twitter" href="#" title="Add Twitter Feed"><i class="fa fa-twitter"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="weather" href="#" title="Add Weather Feed"><i class="fa fa-sun-o"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="notepad" href="#" title="Add Notepad"><i class="fa fa-sticky-note"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="todo" href="#" title="Add ToDo List"><i class="fa fa-list"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="rss" href="#" title="Add RSS Feed"><i class="fa fa-rss-square"></i></a></li>
            <li><a class="add-widget-button" data-widget-type="stream" href="#" title="Add Stream"><i class="fa fa-newspaper-o"></i></a></li>
        </ul>
        <ul class="list-inline pull-right">
            <li><a class="delete-widgets-button" href="#" title="Delete Widgets"><i class="fa fa-trash-o"></i></a></li>
        </ul>
    </div>
    <!-- Bottom Bar end -->
@endsection
