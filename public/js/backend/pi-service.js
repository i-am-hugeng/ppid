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
    $("#card-table-pi-service").append(
        '<div class="overlay overlay-table-pi-service">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#modal-body-edit-pi-service").append(
        '<div class="overlay overlay-modal-edit-pi-service">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    $("#form-edit-pi-service").find("textarea").val("");
    $("#form-edit-pi-service").find("input").val("");
    closeModalEdit();
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-pi-service").append(
        '<div class="overlay overlay-modal-delete-pi-service">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-pi-service").html("");
});

$(".close").on("click", function () {
    $("#form-add-pi-service").find("textarea").val("");
    $("#form-add-pi-service").find("input").val("");
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
});

// Show Table of pi-services
showPiServicesTable();

function showPiServicesTable() {
    $("#card-body-table-pi-service").html("");

    $.ajax({
        type: "GET",
        url: "/admin/pi-service/show-pi-services",
        success: function (response) {
            // Get all data public information services from response json
            if (response.dataPiService != "") {
                $("#card-body-table-pi-service").append(
                    '<table id="table-pi-services" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th style="width: 20%">Judul</th>\
                                <th style="width: 45%">Deskripsi</th>\
                                <th style="max-width: 15%;">URL</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-pi-service"></tbody>\
                    </table>'
                );
                $.each(response.dataPiService, function (key, value) {
                    $("#table-body-pi-service").append(
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
                            <td class="table-cell">\
                            <a href="' +
                            value.url +
                            '" target="_blank">' +
                            value.url +
                            '</a>\
                            </td>\
                            <td class="text-center">\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-pi-service"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-pi-service"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-pi-service").append(
                    "<p>Belum ada Data</p>"
                );
            }
            $(".overlay-table-pi-service").remove();
        },
    });
}

// Submit Add Form
$("#form-add-pi-service")
    .on("submit")
    .validate({
        rules: {
            add_title: {
                required: true,
            },
            add_description: {
                required: true,
            },
            add_url: {
                required: true,
                maxlength: 250,
            },
        },
        messages: {
            add_title: {
                required: "Masukkan judul layanan informasi.",
            },
            add_description: {
                required: "Masukkan deskripsi layanan informasi.",
            },
            add_url: {
                required:
                    "Masukkan link google form permintaan layanan informasi.",
                maxlength: "Maksimal 250 karakter.",
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
            $("#btn-add-pi-service").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-pi-service").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/pi-service/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data layanan informasi berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-pi-service").modal("hide");
                    $("#form-add-pi-service").find("textarea").val("");
                    $("#form-add-pi-service").find("input").val("");
                    $("#btn-add-pi-service").text("Simpan");
                    $("#btn-add-pi-service").attr("disabled", false);
                    $("#table-pi-services").remove();
                    showCardLoader();
                    showPiServicesTable();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idPiService = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/pi-service/modal-edit/" + idPiService,
        success: function (response) {
            // Get data public information service from response json
            $("#edit-pi-service-id").val(response.dataEdit.id);
            $("#edit-title").val(response.dataEdit.title);
            $("#edit-description").val(response.dataEdit.description);
            var str = $("#edit-description").val();
            var regex = /<br\s*[\/]?>/gi;
            $("#edit-description").val(str.replace(regex, ""));
            $("#edit-url").val(response.dataEdit.url);
            $(".overlay-modal-edit-pi-service").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-pi-service")
    .on("submit")
    .validate({
        rules: {
            add_title: {
                required: true,
            },
            add_description: {
                required: true,
            },
            add_url: {
                required: true,
            },
        },
        messages: {
            add_title: {
                required: "Masukkan judul layanan informasi.",
            },
            add_description: {
                required: "Masukkan deskripsi layanan informasi.",
            },
            add_url: {
                required:
                    "Masukkan link google form permintaan layanan informasi.",
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
            $("#btn-edit-pi-service").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-pi-service").attr("disabled", true);

            var id = $("#edit-pi-service-id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/pi-service/edit/" + id,
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data layanan informasi berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-pi-service").modal("hide");
                    $("#form-edit-pi-service").find("textarea").val("");
                    $("#form-edit-pi-service").find("input").val("");
                    $("#btn-edit-pi-service").text("Simpan");
                    $("#btn-edit-pi-service").attr("disabled", false);
                    $("#table-pi-services").remove();
                    showCardLoader();
                    showPiServicesTable();
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
        url: "/admin/pi-service/modal-delete/" + idDelete,
        success: function (response) {
            // Get data public information service from response json
            $("#delete-pi-service-id").val(response.dataDelete.id);
            $(".card-body-delete-pi-service").append(
                "<p>Anda yakin untuk menghapus layanan informasi publik : <strong>" +
                    response.dataDelete.title +
                    "</strong>?"
            );

            $(".overlay-modal-delete-pi-service").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-pi-service").on("submit", function (e) {
    e.preventDefault();

    const idDelete = $("#delete-pi-service-id").val();

    $("#btn-delete-pi-service").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-pi-service").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/pi-service/delete/" + idDelete,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus layanan informasi publik.",
            });
            $("#modal-delete-pi-service").modal("hide");
            $(".card-body-delete-pi-service").html("");
            $("#btn-delete-pi-service").text("Hapus");
            $("#btn-delete-pi-service").attr("disabled", false);
            $("#table-pi-services").remove();
            closeModalDelete();
            showCardLoader();
            showPiServicesTable();
        },
    });
});
