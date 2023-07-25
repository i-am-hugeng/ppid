{{-- Modal Add Other Information --}}
<div class="modal fade" id="modal-add-other-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Informasi Lainnya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-other-information">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-other-information"
                            name="add_other_information" placeholder="Kategori informasi lainnya">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-other-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Other Information --}}
<div class="modal fade" id="modal-edit-other-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Informasi Lainnya</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-other-information">
                <div id="card-modal-edit-other-information" class="card">
                    <div class="card-body">
                        <input type="hidden" id="edit-other-information-id" name="edit_other_information_id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit-other-information"
                                name="edit_other_information" placeholder="Kategori informasi lainnya">
                        </div>
                    </div>
                    <div class="overlay overlay-modal-edit-other-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-other-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Other Information --}}
<div class="modal fade" id="modal-delete-other-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori Informasi Lainnya</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-other-information">
                <div id="card-modal-delete-other-information" class="card">
                    <input type="hidden" id="delete-other-information-id" name="delete_other_information_id">
                    <div class="card-body card-body-delete-other-information">

                    </div>
                    <div class="overlay overlay-modal-delete-other-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-other-information"
                        class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
