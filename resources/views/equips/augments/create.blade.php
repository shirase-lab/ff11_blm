@extends('layouts.common')

@section('content')
<div class="row">
  <div class="col-6 offset-3">
    {{Form::model($augment, ['route' => array('augment.store',$equip_id)])}}
      <div class="form-group">
        {{Form::label('equip_id', '装備', ['class' => "form-label"])}}
        {{Form::label('equip', $equip, ['class' => "form-label"])}}
      </div>
      <div class="form-group">
        {{Form::label('level', 'タイプ', ['class' => "form-label"])}}
        {{Form::select('type', ['-' => '-' , 'A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'])}}
      </div>
      <div class="form-group">
        {{Form::label('level', 'ランク', ['class' => "form-label"])}}
        {{Form::text('rank', $augment->rank, ['class' => "form-control", 'placeholder' => 'rank'])}}
      </div>
      <div class="form-group">
        {{Form::label('status', 'ステータス', ['class' => "form-label"])}}
        {{Form::textarea('status', $augment->status, ['class' =>"form-control", 'rows' => 4] )}}
      </div>
      <div class="form-group">
        {{Form::label('hide_status', '隠し及び未対応フォーマットステータス', ['class' => "form-label"])}}
        {{Form::textarea('hide_status', $augment->hide_status, ['class' =>"form-control", 'rows' => 2] )}}
      </div>
      <button>送信</button>
    {{ Form::close() }}
  </div>
</div>

@endsection
