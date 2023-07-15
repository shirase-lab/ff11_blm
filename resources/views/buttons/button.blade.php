<button type="button" class="btn px-0 py-0 btn-lg text-nowrap w-100 equip_button" part_id="{{$part_id}}">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="part_{{$part}}" viewBox="0 0 100 100">
    <rect class="equip_square" x="0" y="0" rx="5" ry="5" width="100" height="100" fill="#CCCCCC" style="stroke-width:2;stroke:#000"/>
    <text class="equip_part_name" x="50%" y="60%" text-anchor="middle" dominant-baseline="middle" font-family="Mochiy Pop P One" font-size="14" style="stroke-width:2;stroke:#000000FF;fill:#ffffffE0;paint-order:stroke;">{{$title}}</text>
    <image class="equip_image" x="5" y="5" width="95" height="95" xlink:href="" />
    <text class="equip_name" x="50%" y="70%" text-anchor="middle" dominant-baseline="middle" font-family="Mochiy Pop P One" font-size="12" style="stroke-width:2;stroke:#000;fill:#fff;paint-order:stroke;"></text>
    <text class="equip_rp" x="50%" y="85%" text-anchor="middle" dominant-baseline="middle" font-family="Mochiy Pop P One" font-size="8" style="stroke-width:2;stroke:#000;fill:#fff;paint-order:stroke;"></text>
    <rect class="rect_select" x="0" y="0" rx="5" ry="5" width="100" height="100" fill="#00000000" style="stroke-width:2;stroke:#C44;display:none;"/>
  </svg>
  <div class="equiped_status d-none"></div>
  <div class="equiped_aug_status d-none"></div>
  <div class="equiped_hide_status d-none"></div>
</button>
