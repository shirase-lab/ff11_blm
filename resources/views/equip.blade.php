@extends('layouts.common')

@section('content')
<div class="row">
  <div class="col-12">
    JuvenileのファイアVが発動。<br>
    →マジックバースト！Triboulexに、<span id="mb_damage"></span>ダメージ。
  </div>
</div>
<div class="row pt-1">
  <div class="col-md-2 col-12">
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
  <div class="row pt-1">
    <div class="col-4">
      <div class="row">
        魔法: <span id="magic">ファイアV</span>
      </div>
      <div class="row">
        <div class="col-4">魔法D値</div><div id="M_Dvalue" class="col-8">800</div>
      </div>
      <div class="row">
        <div class="col-4">INT</div><div id="M_int_sum" class="col-8"></div>
      </div>
      <div class="row">
        <div class="col-4">魔法ダメージ</div><div id="M_dmg" class="col-8"></div>
      </div>
      <div class="row">
        <div class="col-4">INT関数</div><div id="M_coefficient" class="col-8"></div>
      </div>
      <div class="row">
        <div class="col-4">相乗効果</div><div id="M_synergy" class="col-8">1.05</div>
      </div>
      <div class="row">
        <div class="col-4">属性杖</div><div id="M_staff" class="col-8">1.0</div>
      </div>
      <div class="row">
        <div class="col-4">アフィニティ</div><div id="M_affinity" class="col-8">1.0</div>
      </div>
      <div class="row">
        <div class="col-4">MB.ボーナス</div><div id="M_mb_bonus" class="col-8">2.9</div>
      </div>
      <div class="row">
        <div class="col-4">MB.ボーナス(特性・装備)</div><div id="M_mb_bonus_eq" class="col-8">1.45</div>
      </div>
      <div class="row">
        <div class="col-4">曜日・天候</div><div id="M_effect" class="col-8">1.25</div>
      </div>
      <div class="row">
        <div class="col-4">レジスト</div><div id="M_resist" class="col-8">1.0</div>
      </div>
      <div class="row">
        <div class="col-4">ガンビット</div><div id="M_gambit" class="col-8">1.0</div>
      </div>
      <div class="row">
        <div class="col-4">魔法攻撃力</div><div id="M_m_atk" class="col-8"></div>
      </div>

    </div>
    <div class="col-4">
      <div class="row">
        敵：Triboulex(Gボス・バラモア)
      </div>
      <div class="row">
        <div class="col-2">INT</div><div class="col-10" id="enemy_int">340</div>
      </div>
      <div class="row">
        <div  class="col-2">魔防</div><div class="col-10" id="enemy_mbarrier">61</div>
      </div>
      <div class="row">
        <div  class="col-2">魔法カット</div><div class="col-10" id="enemy_mcut">1.0</div>
      </div>
      <div class="row">
        <div class="col">火</div>
        <div class="col">土</div>
        <div class="col">水</div>
        <div class="col">風</div>
        <div class="col">氷</div>
        <div class="col">雷</div>
        <div class="col">光</div>
        <div class="col">闇</div>
      </div>
      <div class="row">
        <div class="col" id="enemy_resist_f">60%</div>
        <div class="col" id="enemy_resist_e">50%</div>
        <div class="col" id="enemy_resist_w">50%</div>
        <div class="col" id="enemy_resist_a">50%</div>
        <div class="col" id="enemy_resist_i">50%</div>
        <div class="col" id="enemy_resist_t">60%</div>
        <div class="col" id="enemy_resist_l">-</div>
        <div class="col" id="enemy_resist_d">-100%</div>
      </div>
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