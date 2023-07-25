{{-- Modal Add Regulation List --}}
<div class="modal fade" id="modal-add-regulation-list">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Daftar Regulasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-regulation-list" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" style="width: 100%;" id="add-regulation-category"
                            name="add_regulation_category">
                            <option value="" selected>--Pilih Kategori Regulasi--</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-regulation-number"
                            name="add_regulation_number" placeholder="Nomor Regulasi">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="add-regulation-about" name="add_regulation_about" rows="4"
                            placeholder="Judul Regulasi"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-regulation-url" name="add_regulation_url"
                            placeholder="Link Unduh Regulasi">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-regulation-list" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Regulation List --}}
<div class="modal fade" id="modal-edit-regulation-list">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Daftar Regulasi</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-regulation-list" enctype="multipart/form-data">
                <div id="modal-body-edit-regulation-list" class="modal-body">
                    <input type="hidden" id="edit-regulation-list-id" name="edit_regulation_list_id">
                    <div class="form-group">
                        <select class="form-control" style="width: 100%;" id="edit-regulation-category"
                            name="edit_regulation_category">
                            <option value="" Selected>--Pilih Kategori Regulasi--</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-regulation-number"
                            name="edit_regulation_number" placeholder="Nomor Regulasi">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="edit-regulation-about" name="edit_regulation_about" rows="4"
                            placeholder="Judul Regulasi"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-regulation-url" name="edit_regulation_url"
                            placeholder="Link Unduh Regulasi">
                    </div>

                    <div class="overlay overlay-modal-edit-regulation-list">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-regulation-list" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Regulation List --}}
<div class="modal fade" id="modal-delete-regulation-list">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Daftar Regulasi</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-regulation-list">
                <div id="card-modal-delete-regulation-list" class="card">
                    <input type="hidden" id="delete-regulation-list-id" name="delete_regulation_list_id">
                    <div class="card-body card-body-delete-regulation-list">

                    </div>
                    <div class="overlay overlay-modal-delete-regulation-list">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-regulation-list"
                        class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
