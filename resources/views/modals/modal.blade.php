
<div class="modal fade" id="modal_{{$name}}" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{$name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-dialog-scrollable">
        <div class="row">
          @include('modals.modal_content', ['name' => $name, 'part' => $part ] )
          <div class="col-6 pt-1">
            <div class="card card-equip" style="width: 100%;" id="card-38208-1" part="{{$part}}">
              <div class="row">
                <div class="col-2">
                  <img src="https://www.bg-wiki.com/images/1/13/Bunzi%27s_Rod_icon.png" class="card-img-top" alt="ブンジロッド[+15]">
                </div>
                <div class="col-10">
                  <div class="card-body">
                    <h5 class="card-title">ブンジロッド[+15]</h5>
                    <p class="text_{{$part}}" class="card-text">Ｄ144 隔216 MP+40 INT+15 MND+15<br>
                      命中+40 魔命+40 魔攻+35 魔法ダメージ+248<br>
                      片手棍スキル+242 受け流しスキル+242<br>
                      魔命スキル+255 マジックバーストダメージ+10<br>
                      ケアル回復量+30%<br>
                      [1]Ｄ+8<br>
                      [2]魔攻+15<br>
                      [3]-<br>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 pt-1">
            <div class="card card-equip" style="width: 18rem;" id="card-38208-2" part="{{$part}}">
              <img src="https://www.bg-wiki.com/images/1/13/Bunzi%27s_Rod_icon.png" class="card-img-top" alt="ブンジロッド[+20]">
              <div class="card-body">
                <h5 class="card-title">ブンジロッド[+20]</h5>
                <p class="card-text">Ｄ144 隔216 MP+40 INT+15 MND+15
                  命中+40 魔命+40 魔攻+35 魔法ダメージ+248
                  片手棍スキル+242 受け流しスキル+242
                  魔命スキル+255 マジックバーストダメージ+10
                  ケアル回復量+30%
                  [1]Ｄ+9<br>
                  [2]魔攻+20<br>
                  [3]命中+5 魔命+5<br>
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 pt-1">
            <div class="card card-equip" style="width: 18rem;" id="card-38208-3" part="{{$part}}">
              <img src="https://www.bg-wiki.com/images/1/13/Bunzi%27s_Rod_icon.png" class="card-img-top" alt="ブンジロッド[+25]">
              <div class="card-body">
                <h5 class="card-title">ブンジロッド[+25]</h5>
                <p class="card-text">Ｄ144 隔216 MP+40 INT+15 MND+15
                  命中+40 魔命+40 魔攻+35 魔法ダメージ+248
                  片手棍スキル+242 受け流しスキル+242
                  魔命スキル+255 マジックバーストダメージ+10
                  ケアル回復量+30%
                  [1]Ｄ+10<br>
                  [2]魔攻+25<br>
                  [3]命中+10 魔命+10<br>
                  [4]敵対心-3<br>
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 pt-1">
            <div class="card card-equip" style="width: 18rem;" id="card-38208-4" part="{{$part}}">
              <img src="https://www.bg-wiki.com/images/1/13/Bunzi%27s_Rod_icon.png" class="card-img-top" alt="ブンジロッド[+30]">
              <div class="card-body">
                <h5 class="card-title">ブンジロッド[+30]</h5>
                <p class="card-text">Ｄ144 隔216 MP+40 INT+15 MND+15
                  命中+40 魔命+40 魔攻+35 魔法ダメージ+248
                  片手棍スキル+242 受け流しスキル+242
                  魔命スキル+255 マジックバーストダメージ+10
                  ケアル回復量+30%
                  [1]Ｄ+11<br>
                  [2]魔攻+30<br>
                  [3]命中+15 魔命+15<br>
                  [4]敵対心-3<br>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>