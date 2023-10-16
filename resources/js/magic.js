var magic_burst = {
  'attribute': '',
  'baseDValue': 0,
  'int_sum': 0,
  'magic_damage': 0,
  'int_method': 0,
  'magic_attack': 0,
  'synergy': 0,
  'affinity': 0,
  'effect': 0,
  'base_mb_bonus': 30,
  'mb_bonus': 0,
  'mb_bonus_eq': 0,
  'resist': 0,
  'gambit': 0,
  'stuff': 0,
}

var resist_table = {
  0: 0,
  5: 0,
  10: 0,
  15: 0,
  20: 0,
  25: 0,
  30: 0,
  40: 0,
  50: 5,
  60: 15,
  70: 40,
  85: 60,
  100: 85,
  115: 115,
  130: 150,
  150: 150,
};

exports.set = (data) =>
{
  $('#magic_name').html(data.name);
  magic_burst.baseDValue = data.base_damage;
  magic_burst.attribute = data.attribute;
  $('#M_Dvalue').html(magic_burst.baseDValue);
  $('#m_attribute').html(magic_burst.attribute);
  $('#coefficients').empty();
  /* 系統係数 */
  const template = $('#coefficient_list').html();
  $.each(data.coefficients, function(i, v) {
    var clone = $(template);
    clone.find('.coefficients_min').html(v.int_diff_min);
    clone.find('.coefficients_max').html(v.int_diff_max);
    clone.find('.coefficients_val').html(v.coefficient.toFixed(2));
    $('#coefficients').append(clone);
  });
  magic_burst.cb();
}

exports.initialize = (cb) =>
{
  magic_burst.cb = cb;
}

exports.MagicBurst = (enemy) =>
{
  var mb = magic_burst;
  var mbDamage = 0;
  mbDamage = Math.floor(mb.baseDValue + mb.magic_damage + int_method(magic_burst.int_sum, parseInt($("#enemy_int").html(), 10)));
  mbDamage = Math.floor(mbDamage * ((mb.synergy/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.stuff/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.affinity/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.mb_bonus/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.mb_bonus_eq/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.effect/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.resist/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * ((mb.gambit/100.0) + 1.0));
  mbDamage = Math.floor(mbDamage * (mb.magic_attack/(enemy.barrier - enemy.debuff_barrier)));
  mbDamage = Math.floor(mbDamage * enemy.cut);
  return mbDamage;
}

exports.magic_burst_info = (player, enemy, resist) =>
{
  magic_burst.int_sum = player.int + player.add_int;
  magic_burst.magic_attack = player.magic_attack + player.add_magic_attack;
  magic_burst.magic_damage = player.magic_damage + player.add_magic_damage;
  magic_burst.int_method = int_method(magic_burst.int_sum, parseInt($("#enemy_int").html(), 10));
  magic_burst.mb_bonus = magic_burst.base_mb_bonus + get_resist(magic_burst.attribute, enemy, resist) + parseInt($('#alignment').val());
  magic_burst.synergy = $('#synergy').val();
  magic_burst.affinity = 0; // TODO
  magic_burst.effect = parseInt($("#effect").val(), 10) + parseInt($("#day").val(), 10);
  magic_burst.mb_bonus_eq = player.magic_burst + player.add_magic_burst + player.add_magic_burst2;
  magic_burst.resist = 0; // TODO
  magic_burst.gambit = parseInt($('#gambit_num').val(), 10);

  $('#m_attribute').html(magic_burst.attribute);
  $('#M_Dvalue').html(magic_burst.baseDValue);
  $('#M_int_sum').html(magic_burst.int_sum);
  $('#M_dmg').html(magic_burst.magic_damage);
  $('#M_coefficient').html(magic_burst.int_method);
  $('#M_m_atk').html(magic_burst.magic_attack);
  $('#M_synergy').html(magic_burst.synergy);
  $('#M_affinity').html(magic_burst.affinity);
  $('#M_effect').html(magic_burst.effect);
  $('#M_mb_bonus').html(magic_burst.mb_bonus);
  $('#M_mb_bonus_eq').html(magic_burst.mb_bonus_eq);
  $('#M_resist').html(magic_burst.resist);
  $('#M_gambit').html(magic_burst.gambit);

}

function int_method(player_int, enemy_int)
{
  var int_diff = Math.abs(player_int - enemy_int);
  let bMinus = (player_int - enemy_int) < 0 ? true : false;
  var ret = 0;
  $($('.coefficients_items').get().reverse()).each(function(k, v) {
    var max = $(v).find('.coefficients_max').html();
    var min = $(v).find('.coefficients_min').html();
    var val = $(v).find('.coefficients_val').html();
    var c = calcCoefficients(int_diff, parseInt(max, 10), parseFloat(val, 10), min);
    ret += c[0];
    int_diff = c[1];
  });
  if (bMinus) { ret *= -1; }
  console.log("calcIntMethod() : ret = " + ret );
  return parseInt(ret, 10);
}

function calcCoefficients( int_diff, threshold ,coefficient, min_threashold )
{
  if (min_threashold <= int_diff && int_diff <= threshold) {
    var ret = (int_diff - min_threashold) * coefficient;
    int_diff -= (int_diff - min_threashold);
    return [ret, int_diff];
  }
  return [0, int_diff];
}


function get_resist(attribute, enemy, resist)
{
  var rayke = parseInt($("#rayke_num").val());
  var ret = 0;
  if (attribute == 'fire') { ret = calc_rayke(enemy.fire, resist, rayke); }
  else if (attribute == 'earth') { ret = calc_rayke(enemy.earth, resist, rayke); }
  else if (attribute == 'water') { ret = calc_rayke(enemy.water, resist, rayke); }
  else if (attribute == 'aero') { ret = calc_rayke(enemy.aero, resist, rayke); }
  else if (attribute == 'ice') { ret = calc_rayke(enemy.ice, resist, rayke); }
  else if (attribute == 'thunder') { ret = calc_rayke(enemy.thunder, resist, rayke); }
  else if (attribute == 'light') { ret = calc_rayke(enemy.light, resist, rayke); }
  else if (attribute == 'dark') { ret = calc_rayke(enemy.dark, resist, rayke); }
  else {
    ret = 0;
  }
  return ret;
}

function calc_rayke(element, resist, rayke)
{
  if (element <= 0) { return resist[0].mb; }
  if (resist[element - 1]._rank == "S") {
    return resist[element - 1].mb;
  }
  var mb = resist[element - 1].mb;
  if (element + rayke >= 15) {
    mb = resist[14].mb;
  } else {
    mb = resist[element - 1 + rayke].mb;
  }
  return mb;
}
