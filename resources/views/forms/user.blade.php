<div class="col-md-8 col-md-offset-2">
    @include('errors.errors')
    <form id="edit-form" class="form-horizontal form-label-left" method="POST" action=>

        <div class="form-group">
            {!! Form::label('first_name', 'First Name', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', 'New Password', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmed', 'Repeat New Password', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::password('password_confirmed', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('phone_number', 'Phone', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="gender" value="male" {{$user->gender == "male" ? 'checked="checked"' : ""}}> &nbsp; Male &nbsp;
                    </label>
                    <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="gender" value="female" {{$user->gender == "female" ? 'checked="checked"' : ""}} > Female
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                {!! Form::submit($btn, ['class' => 'btn btn-sucess']) !!}
            </div>
        </div>

    </form>
</div>