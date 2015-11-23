@extends('layouts.public', ['bodyClasses' => 'page-account-verifysuccess'])

@section('content')

    <h2>Your account has been verified</h2>

    <p>
        Thank you for verifying your account. Please login below:
    </p>

    <?php echo View::make('partials.account.loginform'); ?>

@stop
