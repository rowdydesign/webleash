<!-- Login Form begin -->
{!! Form::open(array('route' => 'login', 'class' => 'form-horizontal login-form form-has-validation')) !!}
    <div class="form-group">
        {!! Form::label('email', 'Email Address', array('class' => 'control-label sr-only')) !!}
        <div class="col-sm-12">
            <?php echo Form::email('email', null, array(
                'class' => 'form-control',
                'placeholder' => 'Email',
                'data-fv-notempty' => 'true',
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
            )) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>
{!! Form::close() !!}
<!-- Login Form end -->
