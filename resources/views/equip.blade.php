@extends('layouts.common')

@section('canvas')
<div class="row">
  <div class="col-12">環境</div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('magics', '魔法', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('magics', $magics, ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('synergy', '相乗効果魔法回数', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('synergy', [0 => '０回', 5 => '１回', 10 => '２回', 15 => '３回', 20 => '４回', 25 => '５回'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('effect', '天候', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('effect', [25 => '強天候＋', 15 => '弱天候＋', 0 => '天候なし', -15 => '弱天候ー', -25 => '強天候ー'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('day', '曜日', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('day', [10 => '強曜日', 0 => '普通曜日', -10 => '弱曜日'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('alignment', '連携回数', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('alignment', [5 => '１回', 15 => '２回', 25 => '３回', 35 => '４回', 45 => '５回', 55 => '６回', 65 => '７回', 70 => '８回'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('geo_effect', '風水魔法+', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('geo_effect', [10 => 'イドリス(+10)', 7 => 'バグアチャーム+2(+7)', 6 => 'バグアチャーム+1(+6)', 5 => 'バグアチャーム(+5)', 5 => 'デュンナ(+5)', 5 => 'ネポテベル(+5)', 3 => 'エミネンベル(+3)', 0 => '風水魔法＋なし(0)'], ['class' =>"form-control"] )}}
  </div>
</div>


<div class="row">
  <div class="col-12">デバフ</div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('geo_malaise', 'ジオマレーズ', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('geo_malaise', true, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('circle_enrich', 'サークルエンリッチ', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('circle_enrich', false, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('blaze_of_glory', 'グローリーブレイズ', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('blaze_of_glory', false, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('bolster', 'ボルスター', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('bolster', false, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('impact', 'インパクト', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('impact', false, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('burn', 'バーン', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('burn', [0 => '0', 13 => '-13', 23 => '-23', 33 => '-33', 43 => '-43', 53 => '-53', 63 => '-63'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('gambit_num', 'ガンビット', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('gambit_num', [0 => '０', 10 => '１', 20 => '２', 30 => '３'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('rayke_num', 'レイク', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('rayke_num', [0 => '０', -1 => '１', -2 => '２', -3 => '３'], ['class' =>"form-control"] )}}
  </div>
</div>

<div class="row">
  <div class="col-12">バフ</div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('soul_voice', 'ソウルボイス', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('soul_voice', false, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('learned_etude', '知恵のエチュード', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('learned_etude', [0 => '0', 9 => '9', 10 => '10(歌+1)', 11 => '11(歌+2)', 12 => '12(歌+3)', 13 => '13(歌+4)', 14 => '14(歌+5)', 15 => '15(歌+6)', 16 => '16(歌+7)', 17 => '17(歌+8)', 18 => '18(歌+9)'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('sage_etude', '英知のエチュード', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('sage_etude', [0 => '0', 15 => '15', 16 => '16(歌+1)', 17 => '17(歌+2)', 18 => '18(歌+3)', 19 => '19(歌+4)', 20 => '20(歌+5)', 21 => '21(歌+6)', 22 => '22(歌+7)', 23 => '23(歌+8)', 24 => '24(歌+9)'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('indi', 'インデ', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('indi', [0 => '', 1 => 'アキュメン', 2 => 'イン', 3 => 'ボルスター・アキュメン', 4 => 'ボルスター・イン'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('entrust', 'エントラスト', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('entrust', [0 => '', 1 => 'アキュメン', 2 => 'イン'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('roll', 'ファントムロール＋', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('roll', [0 => '-', 3 => '+3', 5 => '+5', 6 => '+6', 7 => '+7', 8 => '+8'], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('job_bonus', 'ジョブボーナス', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::checkbox('job_bonus', false, false,  [], ['class' =>"form-control"] )}}
  </div>
</div>
<div class="row">
  <div class="col-5 text-end">
    {{Form::label('wizardz', 'ウィザーズロール', ['class' =>"form-label"] )}}
  </div>
  <div class="col-7">
    {{Form::select('wizardz', [0 => '-', 4 => '１(魔攻+4)', 6 => '２(魔攻+6)', 8 => '３(魔攻+8)', 10 => '４(魔攻+10)', 25 => '５(魔攻+25)', 12 => '６(魔攻+12)', 14 => '７(魔攻+14)', 17 => '８(魔攻+17)', 2 => '９(魔攻+2)', 20 => '１０(魔攻+20)', 30 => '１１(魔攻+30)'], ['class' =>"form-control"] )}}
  </div>
</div>


<div class="pt-5"></div>
<div class="">
  <div class="row">
    <div class="col-6 text-end">
      {{Form::label('enemy', '敵', ['class' =>"form-label"] )}}
    </div>
    <div class="col-6">
      {{Form::select('enemy', $enemies, ['class' =>"form-control"] )}}
    </div>
  </div>
  <div class="row">
    <div class="col-12 border text-center">敵情報</div>
  </div>
  <div class="row">
    <div class="col-12 border text-center" id="enemy_info"></div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">敵INT</div>
    <div class="col-4 border text-end" id="enemy_int"></div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">敵魔防</div>
    <div class="col-4 border text-end" id="enemy_mbarrier"></div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">敵魔法カット</div>
    <div class="col-4 border text-end" id="enemy_mcut">1.0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">風水耐性</div>
    <div class="col-4 border text-end"><span id="enemy_georesist"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">火</div>
    <div class="col-4 border text-end"><span id="enemy_resist_fire"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">土</div>
    <div class="col-4 border text-end"><span id="enemy_resist_earth"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">水</div>
    <div class="col-4 border text-end"><span id="enemy_resist_water"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">風</div>
    <div class="col-4 border text-end"><span id="enemy_resist_aero"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">氷</div>
    <div class="col-4 border text-end"><span id="enemy_resist_ice"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">雷</div>
    <div class="col-4 border text-end"><span id="enemy_resist_thunder"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">光</div>
    <div class="col-4 border text-end"><span id="enemy_resist_light"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">闇</div>
    <div class="col-4 border text-end"><span id="enemy_resist_dark"></span>%</div>
  </div>
</div>

<div class="pt-2"></div>
<div class="d-none">
  <div class="row ">
    <div class="col-12 border text-center">弱体効果</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">ジオマレーズ</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">ヴィゾフニル・シャッターソウル</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">レイク</div>
    <div class="col-4 border text-end" id="M_rayke">0</div>
  </div>
</div>


<div class="row pt-5"></div>
<div class="">
  <div class="row">
    <div class="col-12 border text-center">マジックバースト情報</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">属性</div>
    <div class="col-4 border text-end" id="m_attribute">{{$magic->attribute}}</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">魔法基礎D値</div>
    <div class="col-4 border text-end" id="M_Dvalue">{{$magic->base_damage}}</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">INT合計</div>
    <div class="col-4 border text-end" id="M_int_sum">138</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">魔法ダメージ</div>
    <div class="col-4 border text-end" id="M_dmg">23</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">INT関数</div>
    <div class="col-4 border text-end" id="M_coefficient"></div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">魔法攻撃力</div>
    <div class="col-4 border text-end" id="M_m_atk"></div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">相乗効果魔法</div>
    <div class="col-4 border text-end">+<span id="M_synergy">0</span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">アフィニティ</div>
    <div class="col-4 border text-end">+<span id="M_affinity">0</span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">曜日・天候</div>
    <div class="col-4 border text-end">+<span id="M_effect">0</span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">MB.ボーナス</div>
    <div class="col-4 border text-end">+<span id="M_mb_bonus"></span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">MB.ボーナス(特性＋装備)</div>
    <div class="col-4 border text-end">+<span id="M_mb_bonus_eq">0</span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">レジスト</div>
    <div class="col-4 border text-end"><span id="M_resist">0</span>%</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">ガンビット</div>
    <div class="col-4 border text-end">+<span id="M_gambit">0</span>%</div>
  </div>
</div>

<div class="pt-2">
</div>
<div class="d-none">
  <div class="row">
    <div class="col-12 border text-center">強化効果</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">インデイン</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">エントライン</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">ウィザーズロール</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">インデアキュメン</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">エントラアキュメン</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">ソウルボイス</div>
    <div class="col-4 border text-end" id=""></div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">知恵のエチュード</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
  <div class="row">
    <div class="col-8 border text-end">英知のエチュード</div>
    <div class="col-4 border text-end" id="">0</div>
  </div>
</div>
<div class="pt-5"></div>
<div class="">
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-12 border text-center">系統係数</div>
      </div>
      <div class="row">
        <div class="col-4 border text-end">min</div>
        <div class="col-4 border text-end">max</div>
        <div class="col-4 border text-end">係数</div>
      </div>
      <div id="coefficients">
      </div>
      @include('templates.coefficients')
    </div>
  </div>
</div>
<div class="col-6 border d-none" id="M_staff">1.0</div>


@endsection

@section('content')
<div class="row">
  <div class="col-8">
    Juvenileの<span id="magic_name"></span>が発動。<br>
    →マジックバースト！<span id="enemy_name"></span>に、<span id="mb_damage"></span>ダメージ。
  </div>
  <div class="col-4">
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
      敵・魔法の設定
    </a>
  </div>
</div>
<div class="row pt-1">
  <div class="col-md-3 col-12">
    @include('statuswindow')
  </div>
  <div class="col-12 col-md-4">
    <div class="row">
      @foreach ($eqparts as $key => $data)
        <div class="col-3 px-1">
          @include('buttons.button', ['title' => $data->name, 'part' => $data->name, 'part_id' => $data->part_id])
        </div>
      @endforeach
    </div>
  </div>
  <div class="col-md-5">
    <div class="row">
      <div class="search-wrapper">
        <div id="part_id" part_id="1"></div>
        <div class="user-search-form d-flex">
          <div class="col-8">
            {{ Form::text('keyword', null, ['id' => 'keyword', 'class' => 'form-control shadow ', 'placeholder' => 'ブンジロッド']) }}
            <span class="searchclear glyphicon glyphicon-remove-circle"></span>
          </div>
          <div class="col-4">
            {{ Form::button('<i class="fa fa-search" aria-hidden="true"></i>', ['class' => 'btn search-icon', 'type' => 'button']) }}
          </div>
        </div>
      </div>
    </div>
    @include('templates.search_result')
    <div class="row equip-list" id="search_results">
      @foreach ($results as $key => $data)
        @include('modals.modal_content', ['name' => "Main", 'part' => "Main", 'data' => $data ] )
      @endforeach
    </div>
  </div>
</div>
<div style="display: none;" id="status_hp" value="" ></div>
<div style="display: none;" id="status_mp" value="" ></div>
<div style="display: none;" id="status_str" value="" ></div>
<div style="display: none;" id="status_dex" value="" ></div>
<div style="display: none;" id="status_vit" value="" ></div>
<div style="display: none;" id="status_agi" value="" ></div>
<div style="display: none;" id="status_int" value="" ></div>
<div style="display: none;" id="status_mnd" value="" ></div>
<div style="display: none;" id="status_chr" value="" ></div>
<div style="display: none;" id="status_m_acc" value="" ></div>
<div style="display: none;" id="status_m_atk" value="" ></div>
<div style="display: none;" id="status_m_dmg" value="" ></div>
<div style="display: none;" id="status_m_askl" value="" ></div>
<div style="display: none;" id="status_m_eskl" value="" ></div>
<div style="display: none;" id="status_m_mb" value="" ></div>
<div style="display: none;" id="status_m_mb2" value="" ></div>
<div style="display: none;" id="status_m_mba" value="" ></div>

@endsection

