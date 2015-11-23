@extends('layouts.error', ['bodyClasses' => 'page-error-auth-unconfirmed'])

@section('error-header')
    <h1>Account Unverified</h1>
@stop

@section('error-body')
    <p>
        You must verify your account before you can login. Please check your inbox for
        the verification email sent out by our system.
    </p>

    <p>
        If you did not recieve the verification email we can
        <a href="{{ route('account.resend-verification') }}">resend</a> it.
    </p>
@stop
