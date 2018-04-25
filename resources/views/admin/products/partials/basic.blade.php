<!-- the first part begin -->
    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        {!! Form::label('category_id', Lang::get('admin_products_edit.Category'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('category_id', $categories->lists('name','id'), null, ['class' => 'form-control form-input100']) !!}
            {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', Lang::get('admin_products_edit.Name'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
        {!! Form::label('price', Lang::get('admin_products_edit.Price'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('price', null, ['class' => 'form-control form-input85', 'required' => 'required']) !!}
            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('price_original') ? 'has-error' : ''}}">
        {!! Form::label('price_original', Lang::get('admin_products_edit.PriceOriginal'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('price_original', null, ['class' => 'form-control form-input85', 'required' => 'required']) !!}
            {!! $errors->first('price_original', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('commission') ? 'has-error' : ''}}">
        {!! Form::label('commission', Lang::get('admin_products_edit.Commission'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('commission', null, ['class' => 'form-control form-input85', 'required' => 'required']) !!}
            {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sort') ? 'has-error' : ''}}">
        {!! Form::label('sort', Lang::get('admin_products_edit.Sort'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('sort', null, ['class' => 'form-control form-input85', 'required' => 'required']) !!}
            {!! $errors->first('sort', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('limit_quantity') ? 'has-error' : ''}}">
        {!! Form::label('limit_quantity', Lang::get('admin_products_edit.LimitQuantity'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('limit_quantity', null, ['class' => 'form-control  form-input85', 'required' => 'required']) !!}
            {!! $errors->first('limit_quantity', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('virtual_membership_duration') ? 'has-error' : ''}}">
        {!! Form::label('virtual_membership_duration', Lang::get('admin_products_edit.VirtualMembershipDuration'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('virtual_membership_duration', null, ['class' => 'form-control  form-input85', 'required' => 'required']) !!}
            {!! $errors->first('virtual_membership_duration', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('specification_name1') ? 'has-error' : ''}}">
        {!! Form::label('specification_name1', Lang::get('admin_products_edit.SpecificationName1'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('specification_name1', null, ['class' => 'form-control form-input300', 'required' => 'required']) !!}
            {!! $errors->first('specification_name1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('specification_category1') ? 'has-error' : ''}}">
        {!! Form::label('specification_category1', Lang::get('admin_products_edit.SpecificationCategory1'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('specification_category1', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('specification_category1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('specification_name2') ? 'has-error' : ''}}">
        {!! Form::label('specification_name2', Lang::get('admin_products_edit.SpecificationName2'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('specification_name2', null, ['class' => 'form-control form-input300', 'required' => 'required']) !!}
            {!! $errors->first('specification_name2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('specification_category2') ? 'has-error' : ''}}">
        {!! Form::label('specification_category2', Lang::get('admin_products_edit.SpecificationCategory2'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('specification_category2', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('specification_category2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('specification_quantity') ? 'has-error' : ''}}">
        {!! Form::label('specification_quantity', Lang::get('admin_products_edit.SpecificationQuantity'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('specification_quantity', null, ['class' => 'form-control form-input85', 'required' => 'required']) !!}
            {!! $errors->first('specification_quantity', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('specification_price') ? 'has-error' : ''}}">
        {!! Form::label('specification_price', Lang::get('admin_products_edit.SpecificationPrice'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('specification_price', null, ['class' => 'form-control form-input85', 'required' => 'required']) !!}
            {!! $errors->first('specification_price', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        {!! Form::label('image', Lang::get('admin_products_edit.Image'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::file('image', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        {!! Form::label('status', Lang::get('admin_products_edit.Status'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('status', $status, null, ['class' => 'form-control  form-input85']) !!}
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
        {!! Form::label('detail', Lang::get('admin_products_edit.Detail'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('detail', null, ['class' => 'form-control','size' => '70x15']) !!}
            <script>

                CKEDITOR.replace( 'detail', {
                    filebrowserBrowseUrl: '/browser/browse.php',
                    filebrowserUploadUrl: '/uploader/upload.php'
                });
//                CKEDITOR.replace( 'detail', {
//                    extraPlugins: 'imageuploader'
//                });
            </script>
            {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
<!-- the first part end -->