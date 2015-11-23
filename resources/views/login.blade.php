@extends('layouts.public', ['bodyClasses' => 'page-login'])

@section('content')

    <h2>Login to WebLeash</h2>

    <?php echo View::make('partials.account.loginform'); ?>

@stop
