@extends('layouts.error', ['bodyClasses' => 'page-error-account-verify'])

@section('error-header')
    <h1>Unable to verify your account</h1>
@stop

@section('error-body')
    <p>
        We were unable to verify your account. Please check the link and try again.
    </p>

    <p>
        If you cannot locate your email or are having trouble with the link we can
        <a href="{{ route('account.resend-verification') }}">resend</a> it.
    </p>
@stop
