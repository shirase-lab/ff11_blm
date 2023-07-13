
<div class="modal fade" id="modal_{{$name}}" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{$name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-dialog-scrollable">
        <div class="row">
          @foreach ($equips as $key => $data)
            @include('modals.modal_content', ['name' => $name, 'part' => $part, 'data' => $data ] )
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>