<!-- Signup Panel begin -->
<div class="signup-panel">
    <header>
        <img src="{{ url() }}/build/images/logo-square.png" alt="WL" class="" />
    </header>
    <div class="signup-panel-body row">
        <div class="heading col-sm-12">
            <h2>Welcome to WebLeash</h2>
            <h3>Sign Up</h3>
        </div>

        <!-- Form Col begin -->
        <div class="form-col col-sm-5">
            {!! Form::open(array('route' => 'account.store', 'class' => 'form-horizontal signup-form form-has-validation')) !!}
                <div class="form-group">
                    {!! Form::label('first_name', 'First Name', array('class' => 'control-label sr-only')) !!}
                    <div class="col-sm-12">
                        {!! Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First', 'data-fv-notempty' => 'true')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Last Name', array('class' => 'control-label sr-only')) !!}
                    <div class="col-sm-12">
                        {!! Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last', 'data-fv-notempty' => 'true')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email Address', array('class' => 'control-label sr-only')) !!}
                    <div class="col-sm-12">
                        <?php echo Form::email('email', null, array(
                            'class' => 'form-control',
                            'placeholder' => 'Email',
                            'data-fv-verbose' => 'true',
                            'data-fv-notempty' => 'true',
                            'data-fv-remote' => 'true',
                            'data-fv-remote-url' => route('account.unique'),
                            'data-fv-remote-type' => 'GET',
                            'data-fv-remote-delay' => '500',
                            'data-fv-remote-message' => 'Email already in use',
                        )) ?>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password', array('class' => 'control-label sr-only')) !!}
                    <div class="col-sm-12">
                        {!! Form::password('password', array(
                            'class' => 'form-control',
                            'placeholder' => 'Password',
                            'data-fv-notempty' => 'true',
                            'minlength' => '6',
                            'maxlength' => '30',
                        )) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('accepts_terms', null, null, array('data-fv-notempty' => 'true', 'data-fv-notempty-message' => 'Accepting our terms is mandatory to proceed')) !!} I agree to the WebLeash Terms and Privacy Policy
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <!-- Form Col end -->

        <!-- Sep Col begin -->
        <div class="sep-col col-sm-2 text-center">
            <div class="vertical-bar"></div>
            or
            <div class="vertical-bar"></div>
        </div>
        <!-- Sep Col end -->

        <!-- SSO Col begin -->
        <div class="sso-col col-sm-5">
            <h3>Signup Using</h3>

            <ul class="list-unstyled">
                <li><a href="#facebook-signup" class="btn btn-lg btn-facebook center-block"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li><a href="#google-plus-signup" class="btn btn-lg btn-google-plus center-block"><i class="fa fa-google-plus"></i> Google+</a></li>
                <li><a href="#twitter-signup" class="btn btn-lg btn-twitter center-block"><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
        </div>
        <!-- SSO Col end -->

    </div><!-- /.signup-panel-body -->

</div>
<!-- Signup Panel end -->
