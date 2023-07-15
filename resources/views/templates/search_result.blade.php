
<template id="equip_list_template">
  <div class="col-12 pt-1">
    <div class="card card-equip bg-color w-100" id="" part="">
      <div class="row">
        <div class="col-2">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg_part" viewBox="0 0 100 100">
            <rect x="10" y="10" width="90" height="90" fill="#808080" style="stroke-width:0;stroke:#000"/>
            <rect x="20" y="20" width="80" height="80" fill="#CCCCCC" style="stroke-width:0;stroke:#000"/>
            <image x="10" y="10" width="90" height="90" xlink:href="" class="t_eq_svgImage" />
          </svg>
        </div>
        <div class="col-10">
          <div class="card-body">
            <div class="card-title equip-font t_equip_name"></div>
            <div class="card-text equip-font t_equip_status"></div>
            <div class="d-none t_equip_hide_status"></div>
            <div class="card-text equip-augment t_equip_aug_status"></div>
            <div class="card-text equip-font"><span class="t_equip_level"></span>～&nbsp<span class="t_equip_jobs"></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>