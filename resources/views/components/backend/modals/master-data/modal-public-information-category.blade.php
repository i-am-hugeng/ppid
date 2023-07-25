<div class="modal fade" id="modal-add-public-information-category">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Informasi Publik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-public-information-category">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-public-information-category"
                            name="add_public_information_category" placeholder="Kategori Informasi Publik">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-public-information-category"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-public-information-category">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Informasi Publik</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-public-information-category">
                <div id="card-modal-edit-public-information-category" class="card">
                    <div class="card-body">
                        <input type="hidden" id="edit-public-information-id" name="edit_public_information_id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit-public-information-category"
                                name="edit_public_information_category" placeholder="Kategori Informasi Publik">
                        </div>
                    </div>
                    <div class="overlay overlay-modal-edit-public-information-category">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-public-information-category"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete-public-information-category">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori Informasi Publik</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-public-information-category">
                <div id="card-modal-delete-public-information-category" class="card">
                    <input type="hidden" id="delete-public-information-id" name="delete_public_information_id">
                    <div class="card-body card-body-delete-public-information-category">

                    </div>
                    <div class="overlay overlay-modal-delete-public-information-category">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-public-information-category"
                        class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
