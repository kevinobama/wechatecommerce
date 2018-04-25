<div class="form-group {{ $errors->has('repeat_purchase_amount') ? 'has-error' : ''}}">
    {!! Form::label('repeat_purchase_amount', Lang::get('admin_products_edit.RepeatPurchaseAmount'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('repeat_purchase_amount', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('repeat_purchase_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('repeat_purchase_discount') ? 'has-error' : ''}}">
    {!! Form::label('repeat_purchase_discount', Lang::get('admin_products_edit.RepeatPurchaseDiscount'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('repeat_purchase_discount', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('repeat_purchase_discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('shipping_price') ? 'has-error' : ''}}">
    {!! Form::label('shipping_price', Lang::get('admin_products_edit.ShippingPrice'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('shipping_price', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('shipping_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('shipping_fee') ? 'has-error' : ''}}">
    {!! Form::label('shipping_fee', Lang::get('admin_products_edit.ShippingFee'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('shipping_fee', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('shipping_fee', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('automatically_be_canceled_aging') ? 'has-error' : ''}}">
    {!! Form::label('automatically_be_canceled_aging', Lang::get('admin_products_edit.AutomaticallyBeCanceledAging'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('automatically_be_canceled_aging', null, ['class' => 'form-control  form-input100']) !!}
        {!! $errors->first('automatically_be_canceled_aging', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>