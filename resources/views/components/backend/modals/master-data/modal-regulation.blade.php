<div class="modal fade" id="modal-add-regulation">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Regulasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-regulation">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-regulation" name="add_regulation"
                            placeholder="Kategori regulasi">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-regulation" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-regulation">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Regulasi</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-regulation">
                <div id="card-modal-edit-regulation" class="card">
                    <div class="card-body">
                        <input type="hidden" id="edit-regulation-id" name="edit_regulation_id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit-regulation" name="edit_regulation"
                                placeholder="Kategori regulasi">
                        </div>
                    </div>
                    <div class="overlay overlay-modal-edit-regulation">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-regulation" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-regulation">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori Regulasi</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-regulation">
                <div id="card-modal-delete-regulation" class="card">
                    <input type="hidden" id="delete-regulation-id" name="delete_regulation_id">
                    <div class="card-body card-body-delete-regulation">

                    </div>
                    <div class="overlay overlay-modal-delete-regulation">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-regulation" class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
