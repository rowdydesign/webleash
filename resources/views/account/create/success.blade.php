@extends('layouts.error', ['bodyClasses' => 'page-error-account-verify'])

@section('error-header')
    <h1>Your account has been created</h1>
@stop

@section('error-body')
    <p>
        Before logging in you must verify your account. Please check your inbox for
        the verification email.
    </p>

    <p>
        If you cannot locate your email or are having trouble with the link we can
        <a href="{{ route('account.resend-verification') }}">resend</a> it.
    </p>
@stop
