<div class="form-group {{ $errors->has('one_level_distribution_commission') ? 'has-error' : ''}}">
    {!! Form::label('one_level_distribution_commission', Lang::get('admin_products_edit.OneLevelDistributionCommission'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('one_level_distribution_commission', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('one_level_distribution_commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('two_level_distribution_commission') ? 'has-error' : ''}}">
    {!! Form::label('two_level_distribution_commission', Lang::get('admin_products_edit.TwoLevelDistributionCommission'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('two_level_distribution_commission', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('two_level_distribution_commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('three_level_distribution_commission') ? 'has-error' : ''}}">
    {!! Form::label('three_level_distribution_commission', Lang::get('admin_products_edit.ThreeLevelDistributionCommission'), ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('three_level_distribution_commission', null, ['class' => 'form-control form-input100']) !!}
        {!! $errors->first('three_level_distribution_commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>