{{-- Modal Add faq --}}
<div class="modal fade" id="modal-add-faq">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add-faq" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="add-question" name="add_question" rows="6" placeholder="Pertanyaan"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="add-answer" name="add_answer" rows="6" placeholder="Jawaban"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-add-faq" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Lihat FAQ --}}
<div class="modal fade" id="modal-read-faq">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Lihat FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-read-body" class="modal-body">

                <div class="overlay overlay-modal-read-faq">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit FAQ --}}
<div class="modal fade" id="modal-edit-faq">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit FAQ</h4>
                <button type="button" class="close close-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit-faq" enctype="multipart/form-data">
                <input type="hidden" id="edit-faq-id" name="edit_faq_id">
                <div id="modal-body-edit-faq" class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="edit-question" name="edit_question" rows="6" placeholder="Pertanyaan"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="edit-answer" name="edit_answer" rows="6" placeholder="Jawaban"></textarea>
                    </div>

                    <div class="overlay overlay-modal-edit-faq">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-edit-faq" class="btn bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete FAQ --}}
<div class="modal fade" id="modal-delete-faq">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Hapus FAQ</h4>
                <button type="button" class="close close-modal-delete" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-faq">
                <div id="card-modal-delete-faq" class="card">
                    <input type="hidden" id="delete-faq-id" name="delete_faq_id">
                    <div class="card-body card-body-delete-faq">

                    </div>
                    <div class="overlay overlay-modal-delete-faq">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn-delete-faq" class="btn bg-gradient-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
