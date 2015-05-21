<div class="form-group row">
  <div class="col-xs-6">
  	{!! Form::label('name', 'Tên:', array('class' => 'input-label')) !!}
  </div>
  <div class="col-xs-6">
  	{!! Form::text('name') !!}
  </div>
</div>

<div class="form-group row">
  <div class="col-xs-6">
  	{!! Form::label('description', 'Mô tả:', array('class' => 'input-label')) !!}
  </div>
  <div class="col-xs-6">
  	{!! Form::textarea('description', null, ['size' => '40x5']) !!}
  </div>
</div>

<div class="form-group row">
  <div class="col-xs-6">
  	{!! Form::label('image', 'Chọn hình ảnh:', array('class' => 'input-label')) !!}
  </div>
  <div class="col-xs-6">
  	{!! Form::file('image') !!}
  </div>
</div>

<div class="form-group row">
  <div class="col-xs-6">
  	{!! Form::label('price', 'Giá:', array('class' => 'input-label')) !!}
  </div>
  <div class="col-xs-6">
  	{!! Form::input('number', 'price', $value = null, $options = array()) !!}
  </div>
</div>

<div class="form-group row">
  <div class="col-xs-6">
  	{!! Form::label('number', 'Số lượng:', array('class' => 'input-label')) !!}
  </div>
  <div class="col-xs-6">
  	{!! Form::input('number', 'number', $value = null, $options = array()) !!}
  </div>
</div>

<div class="form-group row">
  <div class="col-xs-6">
 	  {!! Form::label('animal', 'Animal:', array('class' => 'input-label')) !!}
 	</div>
  <div class="col-xs-6">
    {!!  Form::select('animal', array(
      'Cats' => array('leopard' => 'Leopard'),
      'Dogs' => array('spaniel' => 'Spaniel'),
	  )); !!}
  </div>
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>