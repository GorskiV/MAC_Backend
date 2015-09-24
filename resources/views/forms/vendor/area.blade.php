<div class="col-md-8 col-md-offset-2">
    @include('errors.errors')
    <form id="edit-form" class="form-horizontal form-label-left" method="POST" action=>

        <div class="form-group">
            {!! Form::label('name', 'Project name', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('photo', 'Photo', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::file('photo', null) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('video', 'Video', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::file('video', null) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                {!! Form::submit($btn, ['class' => 'btn btn-sucess']) !!}
            </div>
        </div>

    </form>
</div>