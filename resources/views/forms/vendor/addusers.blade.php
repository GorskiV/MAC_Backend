<div class="col-md-12">
    @include('errors.errors')
        <div class="form-group">
            {!! Form::label('category', 'Choose Users', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-6">
                <select id="example-multiple-selected" name="users[]" multiple="multiple">
                    @foreach($result as $r)

                        <option value="<?php echo $r->id; ?>"><?php echo $r->email; ?></option>

                    @endforeach
                </select>
            </div>
        </div>
        <input type="text" value="{{$projectId}}" name="id" hidden>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                {!! Form::submit($btn, ['class' => 'btn btn-sucess']) !!}
            </div>
        </div>

    </form>
</div>