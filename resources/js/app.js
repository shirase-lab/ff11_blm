require('./bootstrap');
var ajax = require('./ajax.js');
var enemy = require('./enemy.js');
var magic = require('./magic.js')
var player = require('./player.js')

$(document).ready(function () {
  /* 初期値設定 */
  var currentEquipPart = null;
  initialize();
  var resist = null;

  function initialize() {
    $("#magics").val(1);              // 魔法初期値
    ajax.get('resist/', function(data) {
      resist = data;
      enemy.initialize(cb, resist);
      magic.magic_burst_info(player.get(), enemy.get(), resist);
      setEnemy(1, enemy.set);
    });
    magic.initialize(cb);
    setMagic(1, magic.set)

    $("#synergy").val(0);             // 相乗効果魔法回数
    $("#effect").val(25);             // 天候
    $("#day").val(0);                 // 曜日
    $("#alignment").val(5);           // 連携回数
    uncheck($("#impact"));            // インパクト
    $("#burn").val(63);              // バーン
    $("#gambit_num").val(0);          // ガンビット回数
    $("#rayke_num").val(0);           // レイク回数
    $("#geo_effect").val(10);         // 風水魔法
    check($("#geo_malaise"));         // ジオマレーズ
    check($("#circle_enrich"));       // サークルエンリッチ
    check($("#blaze_of_glory"));      // グローリーブレイズ
    uncheck($("#bolster"));           // ボルスター
    uncheck($("#soul_voice"));        // ソウルボイス
    $("#learned_etude").val(0);       // 知恵のエチュード
    $("#sage_etude").val(0);          // 英知のエチュード

    uncheck($("#bolster_indi"));      // ボルスター(インデ)
    $("#indi").val(1);                // インデ
    $("#entrust").val(2);             // エントラスト
    $("#enemy").val(1);               // 敵初期値
    $("#roll").val(7);                // ロール＋
    check($("#job_bonus"));           // ロールジョブボーナス
    $("#wizardz").val(12);            // ウィザーズロール
    player.initialize(cb);
  }

  function cb()
  {
    if (resist == null) {
      setTimeout(cb, 1000);
      return;
    }
    player.buff();
    enemy.debuff();
    magic.magic_burst_info(player.get(), enemy.get(), resist);
    $('#mb_damage').html(magic.MagicBurst(enemy.get()));
  }

  /* 入力切替イベント */
  $("#enemy").change(function() { setEnemy($(this).val(), enemy.set); } );
  $("#magics").change(function() { setMagic($(this).val(), magic.set); });
  $("#synergy").change(function() { cb(); });
  $("#effect").change(function() { cb(); });
  $("#day").change(function() { cb(); });
  $("#alignment").change(function() { cb(); });
  $("#impact").change(function() { cb(); });
  $("#burn").change(function() { cb(); });
  $("#gambit").change(function() {  }); // TODO いる？めんどくない？
  $("#gambit_num").change(function() { cb(); });
  $("#rayke").change(function() { }); // TODO いる？めんどくない？
  $("#rayke_num").change(function() { cb(); });
  $("#geo_effect").change(function() { cb(); });
  $("#geo_malaise").change(function() { cb(); });
  $("#circle_enrich").change(function() { cb(); });
  $("#blaze_of_glory").change(function() { cb(); });
  $("#bolster").change(function() { cb(); });
  $("#soul_voice").change(function() { cb(); });
  $("#learned_etude").change(function() { cb(); });
  $("#sage_etude").change(function() { cb(); });
  $("#indi").change(function() { cb(); });
  $("#entrust").change(function() { cb(); });
  $("#roll").change(function() { cb(); });
  $("#job_bonus").change(function() { cb(); });
  $("#wizardz").change(function() { cb(); });

  /* セッター */
  function setEnemy(val, cb) { ajax.get('enemy/' + val, cb); }
  function setMagic(val, cb) { ajax.get('magic/' + val, cb); }

  /* 装備処理 */
  function cardEquip() {
    var image_url = $(this).find('image').attr('xlink:href');
    var name = $(this).find('.card-title').html();

    var rp = name.substr(name.indexOf('['));
    if (name.indexOf('[') == -1) { rp = ""; }
    else { name = name.substr(0, name.indexOf('[')); }
    currentEquipPart.find('.equip_square').attr('style', "stroke-width:2;stroke:#00000080;fill:#ffffff80;paint-order:stroke;");
    currentEquipPart.find('.equip_square').attr('fill', "#c9fdd7");
    currentEquipPart.find('.equip_image').attr('xlink:href', image_url);
    currentEquipPart.find('.equip_name').html(name);
    currentEquipPart.find('.equip_rp').html(rp);
    currentEquipPart.find('.equiped_status').html($(this).find('.t_equip_status').html());
    currentEquipPart.find('.equiped_aug_status').html($(this).find('.t_equip_aug_status').html());
    currentEquipPart.find('.equiped_hide_status').html($(this).find('.t_equip_hide_status').html());

    cb();
  }

  function clearSelect() {
    $('.equip_button').each(function () {
      $(this).find('.rect_select').attr('style', 'display:none;');
    });
  }

  function selectEquip(elem)
  {
    currentEquipPart = $(elem);
    elem.find('.rect_select').attr('style', 'stroke-width:2;stroke:#C44;display:block;');
  }

  $('.equip_button').on('click', function() {
    console.log("$('.equip_button').on('click');");
    clearSelect();
    selectEquip($(this));
    $('#part_id').attr('part_id', $(this).attr('part_id'));
    let part_id = $('#part_id').attr('part_id');
    search(part_id, '');
  });

  $('.user-search-form .search-icon').on('click', function () {
    let part_id = $('#part_id').attr('part_id');
    let keyword = $('#keyword').val() || '';
    console.log("keyword:" + keyword);
    search(part_id, keyword);
  });

  function search(part_id, keyword) {
    if (!part_id) { return false; }
    $('#search_results').empty();
    $.ajax({
        type: 'GET',
        url: 'equip/?part_id=' + part_id + '&keyword=' + keyword + '&page=',
        dataType: 'json',
        beforeSend: function () {
          $('.loading').removeClass('d-none');
        }
    }).done(function (data) {
      $('.loading').addClass('d-none');
      const template = $('#equip_list_template').html();
      $.each(data, function (index, value) {
        var clone = $(template);
        clone.find('.card-equip').attr('id', value.id);
        clone.find('.card-equip').attr('part_id', value.part_id);
        clone.find('.card-equip').click(cardEquip);
        clone.find('.t_equip_name').html(value.name);
        clone.find('.t_equip_status').html((value.status).replace(/\r?\n/g, '<br>'));
        clone.find('.t_equip_hide_status').html((value.hide_status).replace(/\r?\n/g, '<br>'));
        clone.find('.t_equip_level').html(value.level);
        clone.find('.t_equip_jobs').html(value.jobs);
        clone.find('.t_augment').attr('style', 'display:none');
        clone.find('.t_eq_svgImage').attr('xlink:href', value.image_url);
        $('#search_results').append(clone);
        $.each(value.augments, function(i, v) {
          var clone = $(template);
          clone.find('.card-equip').attr('id', value.id);
          clone.find('.card-equip').attr('part_id', value.part_id);
          clone.find('.card-equip').click(cardEquip);
          clone.find('.t_equip_name').html(value.name);
          clone.find('.t_equip_status').html((value.status).replace(/\r?\n/g, '<br>'));
          clone.find('.t_equip_hide_status').html((value.hide_status).replace(/\r?\n/g, '<br>'));
          clone.find('.t_equip_aug_status').html((v.status).replace(/\r?\n/g, '<br>'));
          clone.find('.t_equip_level').html(value.level);
          clone.find('.t_equip_jobs').html(value.jobs);
          clone.find('.t_augment_type').html(v._type);
          clone.find('.t_augment_rank').html(v._rank);
          clone.find('.t_eq_svgImage').attr('xlink:href', value.image_url);
          $('#search_results').append(clone);
        });
      });

    }).fail(function (error) {
        console.log(error);
    })
  }

  function uncheck(elem)
  {
    elem.removeAttr('checked').prop('checked', false).change();
  }
  function check(elem)
  {
    elem.prop('checked', true).change();
  }

});
  