require('./bootstrap');

$(document).ready(function () {
  var currentEquipPart = null;
  function parseStatus(text, status) {
    // 抽出
    var ret = 0;
    var check = status + "(\\+\\d+|\\-\\d+)";
    var reg = new RegExp(check, 'gm');
    var matchArray = text.match(reg);
    if (!Array.isArray(matchArray)) { return 0; }
    matchArray.forEach(function(e) {
      ret += parseInt(e.match(/\-*\d+/g)[0], 10);
    });
//    console.log(status + ":" + ret);
    return ret;
  }
  
  function updateStatus() {

    var status = new Object();
    var statuses = ["HP", "MP", "STR", "DEX", "VIT", "AGI", "INT", "MND", "CHR", "魔命", "魔攻", "魔法ダメージ", "魔命スキル", "精霊魔法スキル", "マジックバーストダメージ", "マジックバーストダメージII", "マジックバースト命中"];
    var statusArray = ["hp", "mp", "str", "dex", "vit", "agi", "int", "mnd", "chr", "m_acc", "m_atk", "m_dmg", "m_askl", "m_eskl", "m_mb", "m_mb2", "m_mba"];
    $('.equiped_status').each(function (i, element) {
      $.each(statuses, function(index, value) {
        if (isNaN(status[statusArray[index]])) { status[statusArray[index]] = 0; }
        status[statusArray[index]] += parseStatus($(element).html(), value);
      })
    })
    $('.equiped_aug_status').each(function (i, element) {
      $.each(statuses, function(index, value) {
        status[statusArray[index]] += parseStatus($(element).html(), value);
      })
    })
    $('.equiped_hide_status').each(function (i, element) {
      $.each(statuses, function(index, value) {
        status[statusArray[index]] += parseStatus($(element).html(), value);
      })
    })

    $.each(status, function(key, value) {
      console.log(key + ":" + value);
    });
    console.log("status:" + status);
    $.each(statusArray, function(index, value) {
      $("#status_" + value).html(status[value]);
    })
    var statuses = [];
    var i = 0;
    $.each(statusArray, function(index, s) {
      if (s == 'hp') {
        let point = (1594+status[statusArray[index]]);
        $("#status_"+s).html("1594/" + point);
      } else if (s == 'mp') {
        let point = (1292+status[statusArray[index]]);
        $("#status_"+s).html("1292/" + point);
      } else {
        if (status[statusArray[index]] > 0) { $("#status_"+s).html("+"+status[statusArray[index]]); }
        else if (status[statusArray[index]] == 0) { $("#status_"+s).html(""); }
        else { $("#status_"+s).html("-"+status[statusArray[index]]); }
      }
      i++;
    });

    $('#M_int_sum').html(getStatus($('#status_base_int')) + getStatus($('#status_int')));
    $('#M_m_atk').html(getStatus($('#status_base_matk')) + getStatus($('#status_m_atk')));
    $('#M_dmg').html(getStatus($('#status_m_dmg')));

    $('#M_coefficient').html(calcIntMethod());
  }

  function getStatus(elem)
  {
    return parseInt($(elem).html().trim(), 10) || 0;
  }

  function calcIntMethod()
  {
    let player_int = getStatus($('#M_int_sum'));
    let enemy_int = getStatus($('#enemy_int'));
    var int_diff = Math.abs(player_int - enemy_int);
    let bMinus = (player_int - enemy_int ) < 0 ? true : false;
    let coefficients = new Map([
      ['500', ['1.00', 400]],
      ['400', ['1.97', 300]],
      ['300', ['2.97', 200]],
      ['200', ['3.85', 100]],
      ['100', ['4.24', 50]],
      ['50', ['4.80', 0]],
    ]);
    var ret = 0;
    // 上限値の計算とマイナス時の計算をする必要がある。
    console.log("int diff:" + int_diff);
    for (let [key, value] of coefficients) {
      console.log("key:" + key + ", value:" + value);
      var c = calcCoefficients(int_diff, parseInt(key, 10), parseFloat(value[0], 10), value[1]);
      ret += c[0];
      int_diff = c[1];
    }
    if (bMinus) { ret *= -1; }
    console.log("calcIntMethod() : ret = " + ret );
    return ret;
  }

  function calcCoefficients( int_diff, threshold ,coefficient, min_threashold )
  {
    console.log("calcCoefficients(int diff:" + int_diff + ", threshold:" + threshold + ", coefficient:" + coefficient + ", min_threashold:" + min_threashold);
    if (min_threashold <= int_diff && int_diff <= threshold) {
      var ret = (int_diff - min_threashold) * coefficient;
      int_diff -= (int_diff - min_threashold);
      return [ret, int_diff];
    }
    return [0, int_diff];

  }
  

  function cardEquip() {
    console.log("card-equip.onclick");

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
    currentEquipPart.find('.equiped_status').html($(this).find('.t_equip_status'));
    currentEquipPart.find('.equiped_aug_status').html($(this).find('.t_equip_aug_status'));
    currentEquipPart.find('.equiped_hide_status').html($(this).find('.t_equip_hide_status'));


    updateStatus();

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

  /* 検索 */
  $('.user-search-form .search-icon').on('click', function () {
    let part_id = $('#part_id').attr('part_id');
    let searchValue = $('#search_value').val() || '';
    search(part_id, searchValue);
  });

  function search(part_id, searchValue) {
    if (!part_id) { return false; }
    $('#search_results').empty();
    $.ajax({
        type: 'GET',
        url: '/equip/?part_id=' + part_id + '&search_name=' + searchValue + '&page=',
        dataType: 'json',
        beforeSend: function () {
            $('.loading').removeClass('display-none');
        }
    }).done(function (data) { //ajaxが成功したときの処理
      $('.loading').addClass('display-none'); //通信中のぐるぐるを消す
      const template = $('#equip_list_template').html();
      console.log(data);
      $.each(data, function (index, value) {
        var clone = $(template);
        console.log(value.status);
        clone.find('.card-equip').attr('id', value.id);
        clone.find('.card-equip').attr('part_id', value.part_id);
        clone.find('.card-equip').click(cardEquip);
        clone.find('.t_equip_name').html(value.name);
        clone.find('.t_equip_status').html((value.status).replace(/\r?\n/g, '<br>'));
        clone.find('.t_equip_hide_status').html((value.hide_status).replace(/\r?\n/g, '<br>'));
        clone.find('.t_equip_aug_status').html((value.a_status).replace(/\r?\n/g, '<br>'));
        clone.find('.t_equip_level').html(value.level);
        clone.find('.t_equip_jobs').html(value.jobs);
        clone.find('.t_eq_svgImage').attr('xlink:href', value.image_url);
        $('#search_results').append(clone);
      });

    }).fail(function (error) {
        console.log(error);
    })

  }

});
  