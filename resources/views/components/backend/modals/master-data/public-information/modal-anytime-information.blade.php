{{-- Modal Add Anytime Information --}}
<div class="modal fade" id="modal-add-anytime-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Informasi Setiap Saat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-anytime-information">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-anytime-information"
                            name="add_anytime_information" placeholder="Kategori informasi setiap saat">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-anytime-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Anytime Information --}}
<div class="modal fade" id="modal-edit-anytime-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Informasi Setiap Saat</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-anytime-information">
                <div id="card-modal-edit-anytime-information" class="card">
                    <div class="card-body">
                        <input type="hidden" id="edit-anytime-information-id" name="edit_anytime_information_id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit-anytime-information"
                                name="edit_anytime_information" placeholder="Kategori informasi setiap saat">
                        </div>
                    </div>
                    <div class="overlay overlay-modal-edit-anytime-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-anytime-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Anytime Information --}}
<div class="modal fade" id="modal-delete-anytime-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori Informasi Setiap Saat</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-anytime-information">
                <div id="card-modal-delete-anytime-information" class="card">
                    <input type="hidden" id="delete-anytime-information-id" name="delete_anytime_information_id">
                    <div class="card-body card-body-delete-anytime-information">

                    </div>
                    <div class="overlay overlay-modal-delete-anytime-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-anytime-information"
                        class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
