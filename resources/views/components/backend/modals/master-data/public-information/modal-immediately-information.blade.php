{{-- Modal Add Immediately Information --}}
<div class="modal fade" id="modal-add-immediately-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Informasi Serta Merta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-immediately-information">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-immediately-information"
                            name="add_immediately_information" placeholder="Kategori informasi serta merta">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-immediately-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Immediately Information --}}
<div class="modal fade" id="modal-edit-immediately-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Informasi Serta Merta</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-immediately-information">
                <div id="card-modal-edit-immediately-information" class="card">
                    <div class="card-body">
                        <input type="hidden" id="edit-immediately-information-id"
                            name="edit_immediately_information_id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit-immediately-information"
                                name="edit_immediately_information" placeholder="Kategori informasi serta merta">
                        </div>
                    </div>
                    <div class="overlay overlay-modal-edit-immediately-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-immediately-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Immediately Information --}}
<div class="modal fade" id="modal-delete-immediately-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori Informasi Serta Merta</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-immediately-information">
                <div id="card-modal-delete-immediately-information" class="card">
                    <input type="hidden" id="delete-immediately-information-id"
                        name="delete_immediately_information_id">
                    <div class="card-body card-body-delete-immediately-information">

                    </div>
                    <div class="overlay overlay-modal-delete-immediately-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-immediately-information"
                        class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
