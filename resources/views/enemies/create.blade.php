@extends('layouts.common')

@section('content')
<div class="row">
  <div class="col-6 offset-3">
    {{Form::model($enemy, ['route' => 'enemy.store'])}}
    <div class="form-group">
      {{Form::label('name', '名前', ['class' => "form-label"])}}
      {{Form::text('name', $enemy->name, ['class' => "form-control", 'placeholder' => 'name'])}}
    </div>
    <div class="form-group">
      {{Form::label('remarks', '名前', ['class' => "form-label"])}}
      {{Form::textarea('remarks', $enemy->remarks, ['class' => "form-control", 'placeholder' => 'ソーティGボス'])}}
    </div>
    <div class="form-group">
      {{Form::label('eint', 'INT', ['class' => "form-label"])}}
      {{Form::text('eint', $enemy->eint, ['class' => "form-control", 'placeholder' => '500'])}}
    </div>
    <div class="form-group">
      {{Form::label('barrier', '魔防', ['class' => "form-label"])}}
      {{Form::text('barrier', $enemy->barrier, ['class' => "form-control", 'placeholder' => '100'])}}
    </div>
    <div class="form-group">
      {{Form::label('fire', '火属性耐性', ['class' => "form-label"])}}
      {{Form::select('fire', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('aero', '風属性耐性', ['class' => "form-label"])}}
      {{Form::select('aero', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('thunder', '雷属性耐性', ['class' => "form-label"])}}
      {{Form::select('thunder', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('light', '光属性耐性', ['class' => "form-label"])}}
      {{Form::select('light', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('ice', '氷属性耐性', ['class' => "form-label"])}}
      {{Form::select('ice', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('earth', '土属性耐性', ['class' => "form-label"])}}
      {{Form::select('earth', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('water', '水属性耐性', ['class' => "form-label"])}}
      {{Form::select('water', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('dark', '闇属性耐性', ['class' => "form-label"])}}
      {{Form::select('dark', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 85 => '85%', 100 => '100%', 115 => '115%', 130 => '130%', 150 => '150%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('geo', '風水魔法耐性', ['class' => "form-label"])}}
      {{Form::select('geo', [5 => '5%', 10 => '10%', 15 => '15%', 20 => '20%', 25 => '25%', 30 => '30%', 40 => '40%', 40 => '45%', 50 => '50%', 55 => '55%', 60 => '60%', 65 => '65%', 70 => '70%', 75 => '75%', 80 => '80%', 85 => '85%', 90 => '90%', 95 => '95%', 100 => '100%'], ['class' =>"form-control"] )}}
    </div>
    <div class="form-group">
      {{Form::label('impact', 'インパクト', ['class' => "form-label"])}}
      {{Form::checkbox('impact', $enemy->impact, $enemy->impact,  [], ['class' =>"form-control"] )}}
      {{Form::label('burn', 'バーン', ['class' => "form-label"])}}
      {{Form::checkbox('burn', $enemy->burn, $enemy->burn,  [], ['class' =>"form-control"] )}}
    </div>
    <button>送信</button>
    {{ Form::close() }}
  </div>
</div>

@endsection
