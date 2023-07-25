{{-- Modal Add Contact --}}
<div class="modal fade" id="modal-add-contact">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kontak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-contact" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" style="width: 100%;" id="add-title" name="add_title">
                            <option value="" Selected>--Pilih Judul--</option>
                            <option value="Alamat">Alamat</option>
                            <option value="Email">Email</option>
                            <option value="Telepon">Telepon</option>
                            <option value="Whatsapp">Whatsapp</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="add-description" name="add_description" rows="6" placeholder="Deskripsi"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-contact" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit Contact --}}
<div class="modal fade" id="modal-edit-contact">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kontak</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-contact" enctype="multipart/form-data">
                <input type="hidden" id="edit-contact-id" name="edit_contact_id">
                <div id="modal-body-edit-contact" class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-title" name="edit_title"
                            placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="edit-description" name="edit_description" rows="6" placeholder="Deskripsi"></textarea>
                    </div>

                    <div class="overlay overlay-modal-edit-contact">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-contact" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Contact --}}
<div class="modal fade" id="modal-delete-contact">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Kontak</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-contact">
                <div id="card-modal-delete-contact" class="card">
                    <input type="hidden" id="delete-contact-id" name="delete_contact_id">
                    <div class="card-body card-body-delete-contact">

                    </div>
                    <div class="overlay overlay-modal-delete-contact">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-contact" class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
