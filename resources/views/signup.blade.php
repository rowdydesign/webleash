@extends('layouts.public', ['bodyClasses' => 'page-signup has-signup-form'])

@section('main')
    <!-- Hero Section begin -->
    <section id="hero" class="fullscreen">

        <div class="vertical-center-wrap">
            <div class="vertical-center-content">

                <div class="container">
                    <header>
                        <div class="row">
                            <div class="col-xs-6 col-xs-offset-3">
                                <img src="{{ url() }}/build/images/logo-square.png" alt="WL" class="img-responsive center-block" />
                            </div>
                        </div>
                    </header>
                    <article>
                        <h1 class="jumbo text-center">
                            <img src="{{ url() }}/build/images/logo-leash-text-only.png" class="img-responsive" />
                            Your World
                        </h1>

                        <h2 class="text-center">Latest News & Events From The Entire Web At Your Fingertips!</h2>

                        <div class="btn-container row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <ul class="row list-unstyled">
                                    <li class="col-sm-4">
                                        <a href="{{ route('account.create') }}" data-mfp-src="#signup-popup" class="inline-popup-link btn btn-lg btn-facebook center-block"><i class="fa fa-facebook"></i> Signup with Facebook</a>
                                    </li>
                                    <li class="col-sm-4">
                                        <a href="{{ route('account.create') }}" data-mfp-src="#signup-popup" class="inline-popup-link btn btn-lg btn-google-plus center-block"><i class="fa fa-google-plus"></i> Signup with Google+</a>
                                    </li>
                                    <li class="col-sm-4">
                                        <a href="{{ route('account.create') }}" data-mfp-src="#signup-popup" class="inline-popup-link btn btn-lg btn-twitter center-block"><i class="fa fa-twitter"></i> Signup with Twitter</a>
                                    </li>
                                </ul>

                                <div id="email-link-container" class="text-center">
                                    <em>or</em>&nbsp;&nbsp;<a href="{{ route('account.create') }}" data-mfp-src="#signup-popup" class="inline-popup-link">signup with email</a>
                                </div>
                            </div>
                        </div>
                    </article>

                </div><!-- /.container-fluid -->

            </div><!-- /.vertical-center-content -->
        </div><!-- /.vertical-center-wrap -->

    </section>
    <!-- Hero Section end -->

    <!-- Signup Popup Email begin -->
    <div id="signup-popup" class="white-popup mfp-hide signup-popup">
        <div class="popup-body">
            <?php echo View::make('partials.account.signupform'); ?>
        </div><!-- /.popup-body -->
    </div>
    <!-- Signup Popup Email end -->
@endsection
