<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modallabeledit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modallabeledit">Detail Barang</h5>
      </div>
      <div class="modal-body">
        <div class="card-body">
                            <form method="POST" action="{{ route('barang.update', 'test') }}">
                            @csrf
                            @method("PUT")
                            {{method_field("patch")}}
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" disabled>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qty</label>
                                    <input type="text" class="form-control" name="qty" id="qty" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga" disabled>
                                    <input type="hidden" class="form-control" name="id" value="{{ $barang->id}}" id="barang_id">
                                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>