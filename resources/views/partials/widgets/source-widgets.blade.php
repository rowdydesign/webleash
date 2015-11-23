<!-- Source Widgets begin -->
<div id="source-widgets">
    {!! Form::open(array('route' => 'resources.widgets.store', 'method' => 'POST', 'class' => '')) !!}
        @include('partials.widgets.notepad', ['widget' => null])
    {!! Form::close() !!}
</div>
<!-- Source Widgets end -->
