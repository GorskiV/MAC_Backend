<div class="col-md-8 col-md-offset-2">
    @include('errors.errors')
    <form id="edit-form" class="form-horizontal form-label-left" method="POST" action=>

        <div class="form-group">
            {!! Form::label('category', 'Choose Users', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('category[]',null,null,array('multiple'=>true,'class'=>'form fields')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                {!! Form::submit($btn, ['class' => 'btn btn-sucess']) !!}
            </div>
        </div>

    </form>
</div>