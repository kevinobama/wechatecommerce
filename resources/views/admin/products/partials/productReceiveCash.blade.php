<div class="form-group {{ $errors->has('days_automatic_goods_after_delivery') ? 'has-error' : ''}}">
    {!! Form::label('days_automatic_goods_after_delivery', Lang::get('admin_products_edit.DaysAutomaticGoodsAfterDelivery'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('days_automatic_goods_after_delivery', null, ['class' => 'form-control form-input200']) !!}
        {!! $errors->first('days_automatic_goods_after_delivery', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('days_withdraw_cash_after_goods') ? 'has-error' : ''}}">
    {!! Form::label('days_withdraw_cash_after_goods', Lang::get('admin_products_edit.DaysWithdrawCashAfterGoods'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('days_withdraw_cash_after_goods', null, ['class' => 'form-control form-input200']) !!}
        {!! $errors->first('days_withdraw_cash_after_goods', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('money_can_withdraw_cash') ? 'has-error' : ''}}">
    {!! Form::label('money_can_withdraw_cash', Lang::get('admin_products_edit.MoneyCanWithdrawCash'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('money_can_withdraw_cash', null, ['class' => 'form-control form-input200']) !!}
        {!! $errors->first('money_can_withdraw_cash', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('withdraw_message') ? 'has-error' : ''}}">
    {!! Form::label('withdraw_message', Lang::get('admin_products_edit.WithdrawMessage'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::file('withdraw_message', null, ['class' => 'form-control']) !!}
        {!! $errors->first('withdraw_message', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('daily_order_limit') ? 'has-error' : ''}}">
    {!! Form::label('daily_order_limit', Lang::get('admin_products_edit.DailyOrderLimit'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('daily_order_limit', null, ['class' => 'form-control form-input200']) !!}
        {!! $errors->first('daily_order_limit', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('commission_payment_type') ? 'has-error' : ''}}">
    {!! Form::label('commission_payment_type', Lang::get('admin_products_edit.CommissionPaymentType'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('commission_payment_type', $commissionPaymentType, null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('commission_payment_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('total_purchase_amount_limit_as_member') ? 'has-error' : ''}}">
    {!! Form::label('total_purchase_amount_limit_as_member', Lang::get('admin_products_edit.TotalPurchaseAmountLimitAsMember'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('total_purchase_amount_limit_as_member', null, ['class' => 'form-control form-input200']) !!}
        {!! $errors->first('total_purchase_amount_limit_as_member', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('purchase_as_member') ? 'has-error' : ''}}">
    {!! Form::label('purchase_as_member', Lang::get('admin_products_edit.PurchaseAsMember'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('purchase_as_member', $purchaseAsMember, null, ['class' => 'form-control form-input85']) !!}
        {!! $errors->first('purchase_as_member', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>