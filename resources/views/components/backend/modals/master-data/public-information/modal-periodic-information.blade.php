{{-- Modal Add Periodic Information --}}
<div class="modal fade" id="modal-add-periodic-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Informasi Berkala</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-periodic-information">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-periodic-information"
                            name="add_periodic_information" placeholder="Kategori informasi berkala">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-periodic-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Periodic Information --}}
<div class="modal fade" id="modal-edit-periodic-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Informasi Berkala</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-periodic-information">
                <div id="card-modal-edit-periodic-information" class="card">
                    <div class="card-body">
                        <input type="hidden" id="edit-periodic-information-id" name="edit_periodic_information_id">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit-periodic-information"
                                name="edit_periodic_information" placeholder="Kategori informasi berkala">
                        </div>
                    </div>
                    <div class="overlay overlay-modal-edit-periodic-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-periodic-information"
                        class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Periodic Information --}}
<div class="modal fade" id="modal-delete-periodic-information">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kategori Informasi Berkala</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-periodic-information">
                <div id="card-modal-delete-periodic-information" class="card">
                    <input type="hidden" id="delete-periodic-information-id" name="delete_periodic_information_id">
                    <div class="card-body card-body-delete-periodic-information">

                    </div>
                    <div class="overlay overlay-modal-delete-periodic-information">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-periodic-information"
                        class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
