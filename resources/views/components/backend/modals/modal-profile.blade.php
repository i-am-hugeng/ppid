{{-- Modal Add Profile --}}
<div class="modal fade" id="modal-add-profile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-profile" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-title" name="add_title" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="add-description" name="add_description" rows="6" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="add-img" name="add_img">
                        <label class="custom-file-label" for="add-img">Pilih gambar (jika tersedia)</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-profile" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Read Profile --}}
<div class="modal fade" id="modal-read-profile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Lihat Profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-read-body" class="modal-body">

                <div class="overlay overlay-modal-read-profile">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Profile --}}
<div class="modal fade" id="modal-edit-profile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profil</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-profile" enctype="multipart/form-data">
                <input type="hidden" id="edit-profile-id" name="edit_profile_id">
                <div id="modal-body-edit-profile" class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="edit-title" name="edit_title"
                            placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="edit-description" name="edit_description" rows="6" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="form-control-file" id="edit-img" name="edit_img">
                        <label class="custom-file-label" for="edit-img">Pilih gambar (jika tersedia)</label>
                    </div>

                    <div class="overlay overlay-modal-edit-profile">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-profile" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete Profile --}}
<div class="modal fade" id="modal-delete-profile">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Profil</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-profile">
                <div id="card-modal-delete-profile" class="card">
                    <input type="hidden" id="delete-profile-id" name="delete_profile_id">
                    <div class="card-body card-body-delete-profile">

                    </div>
                    <div class="overlay overlay-modal-delete-profile">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-profile" class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
