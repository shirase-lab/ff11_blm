require('./bootstrap');

$(document).ready(function () {
    function parseStatus(text, status) {
      // 抽出
      var ret = 0;
      var check = status + "(\\+|\\-)(\\d+)";
      var reg = new RegExp(check, 'gm');
      var matchArray = text.match(reg);
      if (!Array.isArray(matchArray)) { return 0; }
      matchArray.forEach(function(e) {
        ret += parseInt(e.match(/\d+/g)[0], 10);
      });
      console.log(status + ":" + ret);
      return ret;
    }
  
    function updateStatus()
    {
      var statusArray = ["str", "dex", "vit", "agi", "int", "mnd", "chr", "m_acc", "m_atk", "m_dmg", "m_askl", "m_eskl", "m_mb", "m_mb2", "m_mba"];
      var partArray = ["Main", "Sub", "Range", "Ammo", "Head", "Neck" , "Ear1", "Ear2", "Body", "Hands", "Ring1", "Ring2", "Back", "Waist", "Legs", "Feet"];
      var statuses = [];
      var i = 0;
      statusArray.forEach(function(s) {
        statuses.push(0);
        partArray.forEach(function(p) {
          let status = parseInt($("#status_"+p+"_"+s).html());
          if (!isNaN(status)) {
            statuses[i] += status;
          }
          let augstatus = parseInt($("#status_"+p+"_aug_"+s).html());
          if (!isNaN(augstatus)) {
            statuses[i] += augstatus;
          }
        })
        console.log(statusArray[i] + ":" + statuses[i]);
        if (statuses[i] > 0) { $("#status_"+s).html("+"+statuses[i]); }
        else if (statuses[i] == 0) { $("#status_"+s).html(""); }
        else { $("#status_"+s).html("-"+statuses[i]); }
        i++;
      });
    }
  
    $(".card-equip").click(function (elem) {
      console.log($(this).attr('id'));
      var img_url = $(this).find('image').attr('xlink:href');
      console.log(img_url);
      var name = $(this).find('.card-title').html();
      var rp = name.substr(name.indexOf('['));
      if (name.indexOf('[') == -1) { rp = ""; }
      else { name = name.substr(0, name.indexOf('[')); }
      var part = $(this).attr('part');
      var partId = "#id_" + part;
      var partRectId = "#rect_" + part;
      var partImageId = '#image_' + part;
      var partNameId = '#name_' + part;
      var partRpId = '#rp_' + part;
      console.log(partImageId);
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
      $('.modal').hide();
      $(partId).attr('style', "stroke-width:2;stroke:#00000080;fill:#ffffff80;paint-order:stroke;");
      $(partImageId).attr('xlink:href', img_url);
      $(partNameId).html(name);
      $(partRectId).attr('fill', "#c9fdd7");
      $(partRpId).html(rp);
  
      var partTextId = '#status_' + part;
  
      var text =  $(this).find(partTextId).html();
      console.log(text);
      $("#status_"+part+"_str").html(parseStatus(text, "STR"));
      $("#status_"+part+"_dex").html(parseStatus(text, "DEX"));
      $("#status_"+part+"_vit").html(parseStatus(text, "VIT"));
      $("#status_"+part+"_agi").html(parseStatus(text, "AGI"));
      $("#status_"+part+"_int").html(parseStatus(text, "INT"));
      $("#status_"+part+"_mnd").html(parseStatus(text, "MND"));
      $("#status_"+part+"_chr").html(parseStatus(text, "CHR"));
      $("#status_"+part+"_m_acc").html(parseStatus(text, "魔命"));
      $("#status_"+part+"_m_atk").html(parseStatus(text, "魔攻"));
      $("#status_"+part+"_m_dmg").html(parseStatus(text, "魔法ダメージ"));
      $("#status_"+part+"_m_askl").html(parseStatus(text, "魔命スキル"));
      $("#status_"+part+"_m_eskl").html(parseStatus(text, "精霊魔法スキル"));
      $("#status_"+part+"_m_mb").html(parseStatus(text, "マジックバーストダメージ"));
      $("#status_"+part+"_m_mb2").html(parseStatus(text, "マジックバーストダメージII"));

      var partAugTextId = '#status_' + part + "_aug";
      var augtext =  $(this).find(partAugTextId).html();
      $("#status_"+part+"_aug_str").html(parseStatus(augtext, "STR"));
      $("#status_"+part+"_aug_dex").html(parseStatus(augtext, "DEX"));
      $("#status_"+part+"_aug_vit").html(parseStatus(augtext, "VIT"));
      $("#status_"+part+"_aug_agi").html(parseStatus(augtext, "AGI"));
      $("#status_"+part+"_aug_int").html(parseStatus(augtext, "INT"));
      $("#status_"+part+"_aug_mnd").html(parseStatus(augtext, "MND"));
      $("#status_"+part+"_aug_chr").html(parseStatus(augtext, "CHR"));
      $("#status_"+part+"_aug_m_acc").html(parseStatus(augtext, "魔命"));
      $("#status_"+part+"_aug_m_atk").html(parseStatus(augtext, "魔攻"));
      $("#status_"+part+"_aug_m_dmg").html(parseStatus(augtext, "魔法ダメージ"));
      $("#status_"+part+"_aug_m_askl").html(parseStatus(augtext, "魔命スキル"));
      $("#status_"+part+"_aug_m_eskl").html(parseStatus(augtext, "精霊魔法スキル"));
      $("#status_"+part+"_aug_m_mb").html(parseStatus(augtext, "マジックバーストダメージ"));
      $("#status_"+part+"_aug_m_mb2").html(parseStatus(augtext, "マジックバーストダメージII"));

        
      updateStatus();
  /*    
      console.log(text.match(/魔命(\+|\-)(\d+)/gm));
      console.log(text.match(/魔攻(\+|\-)(\d+)/gm));
      console.log(text.match(/魔命スキル(\+|\-)(\d+)/gm));
      console.log(text.match(/マジックバーストダメージ(\+|\-)(\d+)/gm));
  */
  
    });
  
  });
  