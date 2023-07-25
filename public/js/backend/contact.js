// CSRF Token
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Define Toast
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});

// Card loader
function showCardLoader() {
    $("#card-table-contact").append(
        '<div class="overlay overlay-table-contact">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#modal-body-edit-contact").append(
        '<div class="overlay overlay-modal-edit-contact">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    $("#edit-title").prop("selectedIndex", 0);
    $("#form-edit-contact").find("textarea").val("");
    closeModalEdit();

    $("#edit-contact").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-contact").append(
        '<div class="overlay overlay-modal-delete-contact">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-contact").html("");
});

$(".close").on("click", function () {
    $("#add-title").prop("selectedIndex", 0);
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
    $("#modal-read-body").html("");
    $("#modal-read-body").append(
        '<div class="overlay overlay-modal-read-contact">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
});

// Show Table of Contacts
showContactsTable();

function showContactsTable() {
    $("#card-body-table-contact").html("");

    $.ajax({
        type: "GET",
        url: "/admin/contact/show-contacts",
        success: function (response) {
            // Get all data contacts from response json
            if (response.dataContact != "") {
                $("#card-body-table-contact").append(
                    '<table id="table-contacts" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th style="width: 20%">Judul</th>\
                                <th style="max-width: 50%">Deskripsi</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-contacts"></tbody>\
                    </table>'
                );
                $.each(response.dataContact, function (key, value) {
                    $("#table-body-contacts").append(
                        '<tr>\
                            <td class="text-center">' +
                            (key + 1) +
                            "</td>\
                            <td>" +
                            value.title +
                            "</td>\
                            <td>" +
                            value.description +
                            '</td>\
                            <td class="text-center">\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-contact"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-contact"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-contact").append("<p>Belum ada Data</p>");
            }
            $(".overlay-table-contact").remove();
        },
    });
}

// Submit Add Form
$("#form-add-contact")
    .on("submit")
    .validate({
        rules: {
            add_title: {
                required: true,
            },
            add_description: {
                required: true,
            },
        },
        messages: {
            add_title: {
                required: "Masukkan judul kontak.",
            },
            add_description: {
                required: "Masukkan deskripsi kontak.",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
            $("#btn-add-contact").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-contact").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/contact/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kontak berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-contact").modal("hide");
                    $("#add-contact").prop("selectedIndex", 0);
                    $("#form-add-contact").find("textarea").val("");
                    $("#btn-add-contact").text("Simpan");
                    $("#btn-add-contact").attr("disabled", false);
                    $("#table-contacts").remove();
                    showCardLoader();
                    showContactsTable();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idContact = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/contact/modal-edit/" + idContact,
        success: function (response) {
            // Get data contact from response json
            $("#edit-contact-id").val(response.dataEdit.id);
            $("#edit-title").val(response.dataEdit.title);
            $("#edit-description").val(response.dataEdit.description);
            var str = $("#edit-description").val();
            var regex = /<br\s*[\/]?>/gi;
            $("#edit-description").val(str.replace(regex, ""));

            $(".overlay-modal-edit-contact").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-contact")
    .on("submit")
    .validate({
        rules: {
            edit_title: {
                required: true,
            },
            edit_description: {
                required: true,
            },
        },
        messages: {
            edit_title: {
                required: "Masukkan judul kontak.",
            },
            edit_description: {
                required: "Masukkan deskripsi kontak.",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
        submitHandler: function (form) {
            $("#btn-edit-contact").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-contact").attr("disabled", true);

            var id = $("#edit-contact-id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/contact/edit/" + id,
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kontak berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-contact").modal("hide");
                    $("#edit-contact").prop("selectedIndex", 0);
                    $("#form-edit-contact").find("textarea").val("");
                    $("#btn-edit-contact").text("Simpan");
                    $("#btn-edit-contact").attr("disabled", false);
                    $("#table-contacts").remove();
                    showCardLoader();
                    showContactsTable();
                    closeModalEdit();
                },
            });
        },
    });

// Show Delete Modal
$(document).on("click", ".delete", function () {
    const idDelete = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/contact/modal-delete/" + idDelete,
        success: function (response) {
            // Get data contact from response json
            $("#delete-contact-id").val(response.dataDelete.id);
            $(".card-body-delete-contact").append(
                "<p>Anda yakin untuk menghapus data kontak : <strong>" +
                    response.dataDelete.title +
                    "</strong>?"
            );

            $(".overlay-modal-delete-contact").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-contact").on("submit", function (e) {
    e.preventDefault();

    const idDelete = $("#delete-contact-id").val();

    $("#btn-delete-contact").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-contact").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/contact/delete/" + idDelete,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus kontak.",
            });
            $("#modal-delete-contact").modal("hide");
            $(".card-body-delete-contact").html("");
            $("#btn-delete-contact").text("Hapus");
            $("#btn-delete-contact").attr("disabled", false);
            $("#table-contacts").remove();
            closeModalDelete();
            showCardLoader();
            showContactsTable();
        },
    });
});
