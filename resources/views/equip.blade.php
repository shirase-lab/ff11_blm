@extends('layouts.common')

@section('content')
<div class="mt-5"></div>
  <div class="row pt-1">
    <div class="col-md-3 col-12">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg_status" viewBox="0 0 100 400">
        <rect id="rect_status" x="0" y="0" rx="5" ry="5" width="100" height="240" fill="#010856" style="stroke-width:2;stroke:#000"/>
        <text id="id_status" x="5%" y="4%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="12" style="stroke-width:1;stroke:#000000FF;fill:#ffffffE0;paint-order:stroke;">
          Juvenile
        </text>
        <text id="id_status" x="5%" y="8%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#6060FF;paint-order:stroke;">
          Lv99
        </text>
        <text id="id_status" x="28%" y="8%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#6060FF;paint-order:stroke;">
          黒魔道士
        </text>
        <text id="id_status" x="5%" y="10%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          Lv53
        </text>
        <text id="id_status" x="28%" y="10%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          赤魔道士
        </text>
        <text id="id_status" x="5%" y="12%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          ILv
        </text>
        <text id="id_status" x="28%" y="12%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          119/Su5
        </text>

        <text id="id_status" x="5%" y="16%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          HP
        </text>
        <text id="id_status" x="20%" y="16%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          1594/1594
        </text>
        <text id="id_status" x="5%" y="18%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          MP
        </text>
        <text id="id_status" x="20%" y="18%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          1292/1292
        </text>
        <text id="id_status" x="5%" y="20%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          TP
        </text>
        <text id="id_status" x="20%" y="20%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-style="italic" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          0
        </text>

        <text x="5%" y="24%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          STR
        </text>
        <text x="40%" y="24%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          109
        </text>
        <text id="status_str" x="53%" y="24%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        <text x="5%" y="26%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          DEX
        </text>
        <text x="40%" y="26%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          124
        </text>
        <text id="status_dex" x="53%" y="26%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        <text x="5%" y="28%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          VIT
        </text>
        <text x="40%" y="28%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          111
        </text>
        <text id="status_vit" x="53%" y="28%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        <text x="5%" y="30%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          AGI
        </text>
        <text x="40%" y="30%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          126
        </text>
        <text id="status_agi" x="53%" y="30%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        <text x="5%" y="32%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          INT
        </text>
        <text x="40%" y="32%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          138
        </text>
        <text id="status_int" x="53%" y="32%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        <text x="5%" y="34%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          MND
        </text>
        <text x="40%" y="34%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          117
        </text>
        <text id="status_mnd" x="53%" y="34%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        <text x="5%" y="36%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          CHR
        </text>
        <text x="40%" y="36%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          121
        </text>
        <text id="status_chr" x="53%" y="36%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="40%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          魔命
        </text>
        <text id="status_m_acc" x="55%" y="40%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="42%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          魔攻
        </text>
        <text id="status_m_atk" x="55%" y="42%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>
        
        <text x="5%" y="44%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          魔法ダメージ
        </text>
        <text id="status_m_dmg" x="55%" y="44%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="46%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          魔命スキル
        </text>
        <text id="status_m_askl" x="55%" y="46%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="48%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          精霊魔法スキル
        </text>
        <text id="status_m_eskl" x="55%" y="48%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="50%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          MBダメージ
        </text>
        <text id="status_m_mb" x="55%" y="50%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="52%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          MBダメージII
        </text>
        <text id="status_m_mb2" x="55%" y="52%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

        <text x="5%" y="54%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000FF;fill:#FFFFFF;paint-order:stroke;">
          MB命中
        </text>
        <text id="status_m_mb" x="55%" y="54%" text-anchor="left" dominant-baseline="top" font-family="Noto Sans JP" font-size="7" style="stroke-width:1;stroke:#000000A0;fill:#87f079;paint-order:stroke;">
        </text>

      </svg>
    </div>
    <div class="col-12 col-md-6">
      <div class="row">
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Main', 'part' => 'Main', 'equips' => $Main])
          @include('buttons.button', ['title' => 'Main', 'part' => 'Main'])
          <!-- selected: #c9fdd7 -->
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Sub', 'part' => 'Sub', 'equips' => $Sub])
          @include('buttons.button', ['title' => 'Sub', 'part' => 'Sub'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Range', 'part' => 'Range', 'equips' => $Range])
          @include('buttons.button', ['title' => 'Range', 'part' => 'Range'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Ammo', 'part' => 'Ammo', 'equips' => $Ammo])
          @include('buttons.button', ['title' => 'Ammo', 'part' => 'Ammo'])
        </div>
      </div>

      <div class="row pt-1">
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Head', 'part' => 'Head', 'equips' => $Head])
          @include('buttons.button', ['title' => 'Head', 'part' => 'Head'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Neck', 'part' => 'Neck', 'equips' => $Neck])
          @include('buttons.button', ['title' => 'Neck', 'part' => 'Neck'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Ear1', 'part' => 'Ear1', 'equips' => $Ear])
          @include('buttons.button', ['title' => 'Ear1', 'part' => 'Ear1'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Ear2', 'part' => 'Ear2', 'equips' => $Ear])
          @include('buttons.button', ['title' => 'Ear2', 'part' => 'Ear2'])
        </div>
      </div>
      <div class="row pt-1">
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Body', 'part' => 'Body', 'equips' => $Body])
          @include('buttons.button', ['title' => 'Body', 'part' => 'Body'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Hands', 'part' => 'Hands', 'equips' => $Hands])
          @include('buttons.button', ['title' => 'Hands', 'part' => 'Hands'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Ring1', 'part' => 'Ring1', 'equips' => $Ring])
          @include('buttons.button', ['title' => 'Ring1', 'part' => 'Ring1'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Ring2', 'part' => 'Ring2', 'equips' => $Ring])
          @include('buttons.button', ['title' => 'Ring2', 'part' => 'Ring2'])
        </div>
      </div>
      <div class="row pt-1">
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Back', 'part' => 'Back', 'equips' => $Back])
          @include('buttons.button', ['title' => 'Back', 'part' => 'Back'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Waist', 'part' => 'Waist', 'equips' => $Waist])
          @include('buttons.button', ['title' => 'Waist', 'part' => 'Waist'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Legs', 'part' => 'Legs', 'equips' => $Legs])
          @include('buttons.button', ['title' => 'Legs', 'part' => 'Legs'])
        </div>
        <div class="col-3 px-1">
          @include('modals.modal', ['name' => 'Feet', 'part' => 'Feet', 'equips' => $Feet])
          @include('buttons.button', ['title' => 'Feet', 'part' => 'Feet'])
        </div>
      </div>
    </div>
</div>
@endsection