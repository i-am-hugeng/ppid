{{-- Modal Add --}}
<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Daftar Informasi Setiap Saat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" style="width: 100%;" id="add-category" name="add_category">
                            <option value="" selected>--Pilih Kategori Daftar Informasi Setiap Saat--</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="add-description" name="add_description" rows="4"
                            placeholder="Deskripsi Informasi"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-url" name="add_url"
                            placeholder="Link Unduh Informasi">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Daftar Informasi Setiap Saat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" enctype="multipart/form-data">
                <div id="modal-body-edit" class="modal-body">
                    <input type="hidden" id="edit-id" name="edit_id">
                    <div class="form-group">
                        <select class="form-control" style="width: 100%;" id="edit-category" name="edit_category">
                            <option value="" selected>--Pilih Kategori Daftar Informasi Setiap Saat--</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="edit-description" name="edit_description" rows="4"
                            placeholder="Deskripsi Informasi"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-url" name="edit_url"
                            placeholder="Link Unduh Informasi">
                    </div>
                </div>

                <div class="overlay overlay-modal-edit">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-edit" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete --}}
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Daftar Informasi Setiap Saat</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete">
                <div id="card-modal-delete" class="card">
                    <input type="hidden" id="delete-id" name="delete_id">
                    <div class="card-body card-body-delete">

                    </div>
                    <div class="overlay overlay-modal-delete">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete" class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
