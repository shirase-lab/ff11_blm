var effect = {
  'base' : 130,
  'cb': null,
};
exports.initialize = (cb) =>
{
  $('#M_mb_bonus').html(effect.base);
  effect.cb = cb;
}

exports.update = (elem) =>
{
  var e = parseInt($("#effect").val(), 10);
  var d = parseInt($("#day").val(), 10);
  elem.html(e + d);
}

exports.alignment = () =>
{
  $('#M_mb_bonus').html(calcMagicBurstBonus());
  return e;
}

function calcMagicBurstBonus()
{
  // 基本値
  let mbBonus = 130;
  mbBonus += 20; // ジョブポイント
  let resist = $("#enemy_resist_"+$('#m_attribute').html()).html();
  console.log(resist);
  mbBonus += resist;
  console.log(mbBonus);
  const alignments = {'1':5, '2':15, '3':25, '4':35, '5':45, '6':55, '7':65, '8':70};
  mbBonus += alignments[$("#alignment").val()];
  console.log(mbBonus);
  return mbBonus;
}
exports.calcMagicBurstBonus = calcMagicBurstBonus;
