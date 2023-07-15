<div class="col-12 pt-1">
  <div class="card card-equip bg-color w-100" id="card-38208" part="{{$part}}">
    <div class="row">
      <div class="col-2">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg_{{$part}}" viewBox="0 0 100 100">
          <rect x="10" y="10" width="90" height="90" fill="#808080" style="stroke-width:0;stroke:#000"/>
          <rect x="20" y="20" width="80" height="80" fill="#CCCCCC" style="stroke-width:0;stroke:#000"/>
          <image x="10" y="10" width="90" height="90" xlink:href="{{$data->image_url}}" />
        </svg>
      </div>
      <div class="col-10">
        <div class="card-body">
          <h5 class="card-title equip-font">{{$data->name}}</h5>
          <p id="status_{{$part}}" class="card-text equip-font">
            {!! nl2br($data->status) !!}
          </p>
          <div id="hide_status_{{$part}}" class="d-none">
            {!! nl2br($data->hide_status) !!}
          </div>
          <p id="status_{{$part}}_aug" class="card-text equip-augment">
            @if ($data->aug)
            ----------Augment----------<br>
            {!! nl2br($data->a_status) !!}
            @endif
          </p>
        </div>
      </div>
    </div>
  </div>
</div>