@extends('layouts.common')

@section('content')
<div class="row">
  <div class="col-6 offset-3">
    {{Form::model($equip, ['route' => 'equip.store'])}}
      <div class="form-group">
        {{Form::label('name', '名前', ['class' => "form-label"])}}
        {{Form::text('name', $equip->name, ['class' => "form-control", 'placeholder' => 'name'])}}
      </div>
      <div class="form-group">
        {{Form::label('part_id', '装備箇所', ['class' => "form-label"])}}
        {{Form::select('part_id', $parts, ['class' =>"form-control"] )}}
      </div>
      <div class="form-group">
        {{Form::label('type_id', '種類', ['class' => "form-label"])}}
        {{Form::select('type_id', $types, ['class' =>"form-control"] )}}
      </div>
      <div class="form-group">
        {{Form::label('quality', '種類', ['class' => "form-label"])}}
        {{Form::select('quality', ['NQ', '+1', '+2', '+3'], ['class' =>"form-control"] )}}
      </div>
      <div class="form-group">
        {{Form::label('ex', 'Ex', ['class' => "form-label"])}}
        {{Form::checkbox('ex', $equip->ex, $equip->ex,  [], ['class' =>"form-control"] )}}
        {{Form::label('rare', 'Rare', ['class' => "form-label"])}}
        {{Form::checkbox('rare', $equip->rare, $equip->rare,  [], ['class' =>"form-control"] )}}
      </div>
      <div class="form-group">
        {{Form::label('status', 'ステータス', ['class' => "form-label"])}}
        {{Form::textarea('status', $equip->status, ['class' =>"form-control", 'rows' => 4] )}}
      </div>
      <div class="form-group">
        {{Form::label('hide_status', '隠し及び未対応フォーマットステータス', ['class' => "form-label"])}}
        {{Form::textarea('hide_status', $equip->hide_status, ['class' =>"form-control", 'rows' => 2] )}}
      </div>
      <div class="form-group">
        {{Form::label('level', 'レベル', ['class' => "form-label"])}}
        {{Form::text('level', $equip->level, ['class' => "form-control", 'placeholder' => 'level'])}}
      </div>
      <div class="form-group">
        {{Form::label('jobs', 'ジョブ', ['class' => "form-label"])}}
        {{Form::text('jobs', $equip->jobs, ['class' => "form-control", 'placeholder' => ''])}}
      </div>
      <div class="form-group">
        {{Form::label('image_url', '画像URL', ['class' => "form-label"])}}
        {{Form::text('image_url', $equip->jobs, ['class' => "form-control", 'placeholder' => ''])}}
      </div>
      <div class="form-group">
        {{Form::label('yougo_url', '用語辞典URL', ['class' => "form-label"])}}
        {{Form::text('yougo_url', $equip->jobs, ['class' => "form-control", 'placeholder' => ''])}}
      </div>
      <button>送信</button>
    {{ Form::close() }}
  </div>
</div>

@endsection
