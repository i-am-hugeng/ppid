{{-- Modal Add pi-service --}}
<div class="modal fade" id="modal-add-pi-service">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Layanan Informasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-pi-service" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-title" name="add_title" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="add-description" name="add_description" rows="6" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-url" name="add_url"
                            placeholder="Link Google Form">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-pi-service" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit pi-service --}}
<div class="modal fade" id="modal-edit-pi-service">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Layanan Informasi</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-pi-service" enctype="multipart/form-data">
                <input type="hidden" id="edit-pi-service-id" name="edit_pi_service_id">
                <div id="modal-body-edit-pi-service" class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-title" name="edit_title"
                            placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="edit-description" name="edit_description" rows="6" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-url" name="edit_url"
                            placeholder="Link Google Form">
                    </div>

                    <div class="overlay overlay-modal-edit-pi-service">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-pi-service" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete pi-service --}}
<div class="modal fade" id="modal-delete-pi-service">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Layanan Informasi</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-pi-service">
                <div id="card-modal-delete-pi-service" class="card">
                    <input type="hidden" id="delete-pi-service-id" name="delete_pi_service_id">
                    <div class="card-body card-body-delete-pi-service">

                    </div>
                    <div class="overlay overlay-modal-delete-pi-service">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-pi-service" class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
