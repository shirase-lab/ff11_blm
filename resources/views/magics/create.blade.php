@extends('layouts.common')

@section('content')
<div class="row">
  <div class="col-6 offset-3">
    {{Form::model($magic, ['route' => 'magic.store'])}}
      <div class="form-group">
        {{Form::label('name', '名前', ['class' => "form-label"])}}
        {{Form::text('name', $magic->name, ['class' => "form-control", 'placeholder' => 'name'])}}
      </div>
      <div class="form-group">
        {{Form::label('mp', '消費MP', ['class' => "form-label"])}}
        {{Form::text('mp', $magic->mp, ['class' => "form-control", 'placeholder' => '10'])}}
      </div>
      <div class="form-group">
        {{Form::label('attribute', '属性', ['class' => "form-label"])}}
        {{Form::select('attribute', ['earth' => '土','water' => '水','aero' => '風','fire' => '火', 'ice' => '氷','thunder' => '雷','light' => '光','dark' => '闇'], ['class' =>"form-control"] )}}
      </div>
      <div class="form-group">
        {{Form::label('base_damage', 'D値', ['class' => "form-label"])}}
        {{Form::text('base_damage', $magic->base_damage, ['class' => "form-control", 'placeholder' => '100'])}}
      </div>
      <div class="form-group">
        {{Form::label('cast_time', '詠唱時間', ['class' => "form-label"])}}
        {{Form::text('cast_time', $magic->base_damage, ['class' => "form-control", 'placeholder' => '1000 = 1秒'])}}
      </div>
      <div class="form-group">
        {{Form::label('recast_time', '再詠唱時間', ['class' => "form-label"])}}
        {{Form::text('recast_time', $magic->base_damage, ['class' => "form-control", 'placeholder' => '1000 = 1秒'])}}
      </div>
      <div class="form-group">
        @livewire('coefficient')
      </div>
      <button>送信</button>
    {{ Form::close() }}
  </div>
</div>

@endsection
