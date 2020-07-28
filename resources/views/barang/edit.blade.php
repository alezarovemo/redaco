<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modallabeledit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modallabeledit">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <div class="card-body">
       
                            <form method="POST" action="{{ route('barang.update', 'test') }}">
                            @csrf
                            @method("PUT")
                            {{method_field("patch")}}
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qty</label>
                                    <input type="text" class="form-control" name="qty" id="qty">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga">
                                    <input type="hidden" class="form-control" name="id" value="{{ $barang->id}}" id="barang_id">
                                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>