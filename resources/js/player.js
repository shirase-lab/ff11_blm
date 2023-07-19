var player = {
  'HP': 1594,
  'MP': 1292,
  'str': 109,
  'dex': 124,
  'vit': 111,
  'agi': 126,
  'int': 138,
  'mnd': 117,
  'chr': 121,
  'magic_attack' : 190,
  'magic_damage' : 23,
  'magic_burst' : 36, // ジョブ特性:13 + ギフト:23
  'element_skill' : 497,
  'add_hp' : 0,
  'add_mp' : 0,
  'add_str' : 0,
  'add_dex' : 0,
  'add_vit' : 0,
  'add_agi' : 0,
  'add_int' : 0,
  'add_mnd' : 0,
  'add_chr' : 0,
  'add_magic_attack' : 0,
  'add_magic_damage' : 0,
  'add_magic_burst' : 0,
  'add_magic_burst2' : 0,
  'add_magic_accuracy' : 0,
  'add_magic_accuracy_skill' : 0,
  'add_element_skill' : 0,
  'add_magic_burst_accuracy' : 0,
  'cb' : null,
};

exports.get = () => { return player; }

function initialize(cb)
{
  player.add_str = 0;
  player.add_dex = 0;
  player.add_vit = 0;
  player.add_agi = 0;
  player.add_int = 0;
  player.add_mnd = 0;
  player.add_chr = 0;
  player.add_magic_attack = 0;
  player.add_magic_damage = 0;
  player.add_magic_burst = 0;
  player.add_magic_burst2 = 0;
  player.add_magic_accuracy = 0;
  player.add_magic_accuracy_skill = 0;
  player.add_element_skill = 0;
  player.add_magic_burst_accuracy = 0;
  player.cb = cb;
  status();
}

function buff()
{
  initialize();
  var etude = parseInt($('#learned_etude').val(), 10);
  etude += parseInt($('#sage_etude').val());
  if ($('#soul_voice').prop("checked")) {
    etude *= 2;
  }
  player.add_int = etude;
  indi();
  roll();
  equip();
  status();
}

function roll()
{
  var roll = parseInt($('#roll').val(), 10);
  var job_bonus = $('#job_bonus').prop("checked") ? 10 : 0;
  var wizardz = parseInt($('#wizardz').val(), 10);
  player.add_magic_attack += wizardz + job_bonus + (roll * 2);
}

function equip()
{
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
  console.log(status);
  player.add_hp += status['hp'];
  player.add_mp += status['mp'];
  player.add_str += status['str'];
  player.add_dex += status['dex'];
  player.add_vit += status['vit'];
  player.add_agi += status['agi'];
  player.add_int += status['int'];
  player.add_mnd += status['mnd'];
  player.add_chr += status['chr'];
  player.add_magic_accuracy += status['m_acc'];
  player.add_magic_attack += status['m_atk'];
  player.add_magic_damage += status['m_dmg'];
  player.add_magic_accuracy_skill += status['m_askl'];
  player.add_element_skill += status['m_eskl'];
  player.add_magic_burst += status['m_mb'];
  player.add_magic_burst2 += status['m_mb2'];
  player.add_magic_burst_accuracy += status['m_mba'];
}

function parseStatus(text, status) {
  // 抽出
  var ret = 0;
  var check = "(\\b|\\s|\\]|\\>)" + status + "(\\+\\d+|\\-\\d+)";
  var reg = new RegExp(check, 'gm');
  var matchArray = text.match(reg);
  if (!Array.isArray(matchArray)) { return 0; }
  matchArray.forEach(function(e) {
    ret += parseInt(e.match(/\-*\d+/g)[0], 10);
  });
//    console.log(status + ":" + ret);
  return ret;
}

function indi()
{
  var geo = parseInt($('#geo_effect').val(), 10);
  var indi = parseInt($('#indi').val(), 10);
  var magicType = 0;
  if (indi == 0) {
  } else if (indi == 1) { // アキュメン
    player.add_magic_attack = 15 + (3 * geo);
    magicType = 1;
  } else if (indi == 2) { // イン
    player.add_int += 25 + (2 * geo);
    magicType = 2;
  } else if (indi == 3) { // アキュメン
    player.add_magic_attack = (15 + (3 * geo)) * 2;
    magicType = 1;
  } else if (indi == 4) { // イン
    player.add_int += (25 + (2 * geo)) * 2;
    magicType = 2;
  }
  var entrust = parseInt($('#entrust').val(), 10);

  if (entrust == 1 && magicType != 1) {
    player.add_magic_attack = 15;
  } else if (entrust == 2 && magicType != 2) {
    player.add_int += 25;
  }

}

function status()
{
  $('#status_hp').html(player.HP + "/" + player.HP);
  $('#status_mp').html(player.MP + "/" + player.MP);
  $('#status_base_str').html(player.str);
  $('#status_base_dex').html(player.dex);
  $('#status_base_vit').html(player.vit);
  $('#status_base_agi').html(player.agi);
  $('#status_base_int').html(player.int);
  $('#status_base_mnd').html(player.mnd);
  $('#status_base_chr').html(player.chr);
  $('#status_base_matk').html(player.magic_attack);
  $('#status_base_dmg').html(player.magic_damage);
  $('#status_base_m_mb').html(player.magic_burst);
  $('#status_base_mskl').html(player.element_skill);
  
  setAddStatus($('#status_str'), player.add_str);
  setAddStatus($('#status_dex'), player.add_dex);
  setAddStatus($('#status_vit'), player.add_vit);
  setAddStatus($('#status_agi'), player.add_agi);
  setAddStatus($('#status_int'), player.add_int);
  setAddStatus($('#status_mnd'), player.add_mnd);
  setAddStatus($('#status_chr'), player.add_chr);
  setAddStatus($('#status_m_atk'), player.add_magic_attack);
  setAddStatus($('#status_m_dmg'), player.add_magic_damage);
  setAddStatus($('#status_m_mb'), player.add_magic_burst);
  setAddStatus($('#status_m_mb2'), player.add_magic_burst2);
  setAddStatus($('#status_m_acc'), player.add_magic_accuracy);
  setAddStatus($('#status_m_askl'), player.add_magic_accuracy_skill);
  setAddStatus($('#status_m_eskl'), player.add_element_skill);
  setAddStatus($('#status_m_mba'), player.add_magic_burst_accuracy);
}

function setAddStatus(elem, status)
{
  if (status > 0) { 
    elem.html("+"+status);
  } else if (status < 0) {
    elem.html(status);
  } else {
    elem.html('');
  }
}

exports.initialize = initialize;
exports.buff = buff;
exports.status = status;
