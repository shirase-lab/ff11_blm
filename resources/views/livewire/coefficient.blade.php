
<div>
  <button type="button" class="btn btn-info w-50 mb-3 mt-1" wire:click.prevent="add()">追加</button>
  @foreach($coefficients as $key => $coefficient)
    <div class="form-group">
      <div class="row">
        <div class="col-md-3">
          <label for="coefficients[{{$key}}][int_diff_min]" class="form-label">最小値</label>
          <input class="form-control" placeholder="name" name="coefficients[{{$key}}][int_diff_min]" type="text" value="{{$mindiff[$key]}}" id="coefficients[{{$key}}][int_diff_min]">
        </div>
        <div class="col-md-3">
          <label for="coefficients[{{$key}}][int_diff_max]" class="form-label">最大値</label>
          <input class="form-control" placeholder="name" name="coefficients[{{$key}}][int_diff_max]" type="text" value="{{$maxdiff[$key]}}" id="coefficients[{{$key}}][int_diff_max]">
        </div>
        <div class="col-md-3">
          <label for="coefficients[{{$key}}][coefficient]" class="form-label">係数</label>
          <input class="form-control" placeholder="name" name="coefficients[{{$key}}][coefficient]" type="text" value="5.00" id="coefficients[{{$key}}][coefficient]">
        </div>
        <div class="col-md-3">
          <button type="button" class="btn btn-danger w-50" wire:click.prevent="delete({{$key}})">削除</button>
        </div>
      </div>
    </div>
  @endforeach
</div>