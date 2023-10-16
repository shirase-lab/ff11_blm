var enemy = {
  'int': 0,
  'barrier': 0,
  'fire': 0,
  'earth': 0,
  'water': 0,
  'aero': 0,
  'ice': 0,
  'thunder': 0,
  'light': 0,
  'dark': 0,
  'geo': 0,
  'remarks': 0,
  'cb': null,
  'cut': 1.0,
  'debuff_barrier': 0,
};

var resist;

exports.set = (data) =>
{
  copy(data, enemy);
  console.log("int" + enemy.int);
  $('#enemy_name').html(enemy.name);
  $('#enemy_int').html(enemy.int);
  $('#enemy_mbarrier').html(enemy.barrier);
  
  $('#enemy_resist_fire_rank').html(getResistRank(enemy.fire));
  $('#enemy_resist_earth_rank').html(getResistRank(enemy.earth));
  $('#enemy_resist_water_rank').html(getResistRank(enemy.water));
  $('#enemy_resist_aero_rank').html(getResistRank(enemy.aero));
  $('#enemy_resist_ice_rank').html(getResistRank(enemy.ice));
  $('#enemy_resist_thunder_rank').html(getResistRank(enemy.thunder));
  $('#enemy_resist_light_rank').html(getResistRank(enemy.light));
  $('#enemy_resist_dark_rank').html(getResistRank(enemy.dark));
  
  $('#enemy_resist_fire_alignment').html(getResistAlignment(enemy.fire));
  $('#enemy_resist_earth_alignment').html(getResistAlignment(enemy.earth));
  $('#enemy_resist_water_alignment').html(getResistAlignment(enemy.water));
  $('#enemy_resist_aero_alignment').html(getResistAlignment(enemy.aero));
  $('#enemy_resist_ice_alignment').html(getResistAlignment(enemy.ice));
  $('#enemy_resist_thunder_alignment').html(getResistAlignment(enemy.thunder));
  $('#enemy_resist_light_alignment').html(getResistAlignment(enemy.light));
  $('#enemy_resist_dark_alignment').html(getResistAlignment(enemy.dark));

  $('#enemy_resist_fire').html(getResist(enemy.fire));
  $('#enemy_resist_earth').html(getResist(enemy.earth));
  $('#enemy_resist_water').html(getResist(enemy.water));
  $('#enemy_resist_aero').html(getResist(enemy.aero));
  $('#enemy_resist_ice').html(getResist(enemy.ice));
  $('#enemy_resist_thunder').html(getResist(enemy.thunder));
  $('#enemy_resist_light').html(getResist(enemy.light));
  $('#enemy_resist_dark').html(getResist(enemy.dark));
  $('#enemy_georesist').html(enemy.geo);
  $('#enemy_info').html(enemy.remarks);
  $('#enemy_mcut').html(enemy.cut);
  enemy.cb();
}
exports.initialize = (cb, resist) =>
{
  enemy.cb = cb;
  enemy.resist = resist;
}

exports.get = () =>
{
  return enemy;
}

function getResist(element)
{
  return enemy.resist[element - 1].mb;
}

function getResistRank(element)
{
  return enemy.resist[element - 1]._rank;
}

function getResistAlignment(element)
{
  return enemy.resist[element - 1].alignment;
}
function impact()
{
  if (!$('#impact').prop("checked")) { return 0; }
  if (enemy.dark == 5 || enemy.dark == 10) {
    // フルレジ
    console.log("フルレジ！"); 
    return 0;
  }
  var i = Math.floor((enemy.int * 0.2));
  return i;
}
exports.impact = impact;

function burn()
{
  var burn = parseInt($("#burn").val(), 10);
  return burn;
}
exports.burn = burn;

exports.debuff = () =>
{
  var i = impact();
  var b = burn();
  $("#enemy_int").html(enemy.int - i - b);

  // マレーズ
  var e = parseInt($('#geo_effect').val(), 10);
  var m = $('#geo_malaise').prop("checked");
  var b = enemy.barrier;
  enemy.debuff_barrier = 0;
  if (m) {
    var down = 15 + (e * 3);
    var down_effect = 1.0;
    if ($('#circle_enrich').prop("checked")) {
      down_effect += 0.25;
    }
    if ($('#blaze_of_glory').prop("checked")) {
      down_effect += 0.50;
    }
    // ボルスターは他と重複しない
    if ($('#bolster').prop("checked")) {
      down_effect = 2.0;
    }
    // 計算ここであってる？風水魔法効果がつく前じゃ？
    down *= down_effect;

    var resist = parseFloat($('#enemy_georesist').html()) / 100;
    down *= resist;
    b -= Math.floor(down);
    enemy.debuff_barrier = down;
  }
  $('#enemy_mbarrier').html(Math.max(b, 50)); // 魔防最低値保証
}

function copy(src, dst)
{
  dst.name = src.name;
  dst.int = src.eint;
  dst.barrier = src.barrier;
  dst.fire = src.fire;
  dst.earth = src.earth;
  dst.water = src.water;
  dst.aero = src.aero;
  dst.ice = src.ice;
  dst.thunder = src.thunder;
  dst.light = src.light;
  dst.dark = src.dark;
  dst.geo = src.geo;
  dst.remarks = src.remarks;
}
