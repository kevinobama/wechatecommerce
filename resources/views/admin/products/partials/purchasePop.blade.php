<!-- the first part begin -->
<div class="form-group {{ $errors->has('pop_product') ? 'has-error' : ''}}">
    {!! Form::label('pop_product', Lang::get('admin_products_edit.PopProduct'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('pop_product', $products->lists('name','id'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('pop_product', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pop_content') ? 'has-error' : ''}}">
    {!! Form::label('pop_content', Lang::get('admin_products_edit.PopContent'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('pop_content', null, ['class' => 'form-control','size' => '70x15']) !!}
        <script>
            CKEDITOR.replace( 'pop_content' );
        </script>
        {!! $errors->first('pop_content', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
<!-- the first part end -->