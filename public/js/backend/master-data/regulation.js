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

function showCardLoader() {
    $("#card-table-regulation").append(
        '<div class="overlay overlay-table-regulation">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#card-modal-edit-regulation").append(
        '<div class="overlay overlay-modal-edit-regulation">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    closeModalEdit();

    $("#edit-regulation").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-regulation").append(
        '<div class="overlay overlay-modal-delete-regulation">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-regulation").html("");
});

// Close Modal
$(".close").on("click", function () {
    $("#form-add-regulation").find("input").val("");
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
});

// Show Table of Regulation Categories
showRegulationCategoriesTable();

function showRegulationCategoriesTable() {
    $("#card-body-table-regulation").html("");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/regulation/show-regulations",
        success: function (response) {
            // Get all data category from response json
            if (response.data != "") {
                $("#card-body-table-regulation").append(
                    '<table id="table-regulations" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th>Kategori Regulasi</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-regulations"></tbody>\
                    </table>'
                );
                $.each(response.data, function (key, value) {
                    $("#table-body-regulations").append(
                        '<tr>\
                            <td class="text-center">' +
                            (key + 1) +
                            "</td>\
                            <td>" +
                            value.category +
                            '</td>\
                            <td class="text-center">\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-regulation"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-regulation"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-regulation").append(
                    "<p>Belum ada Data</p>"
                );
            }
            $(".overlay-table-regulation").remove();
        },
    });
}

// Submit Add Form
$("#form-add-regulation")
    .on("submit")
    .validate({
        rules: {
            add_regulation: {
                required: true,
            },
        },
        messages: {
            add_regulation: {
                required: "Masukkan kategori regulasi.",
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
            $("#btn-add-regulation").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-regulation").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/regulation/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori regulasi berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-regulation").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-add-regulation").text("Simpan");
                    $("#btn-add-regulation").attr("disabled", false);
                    $("#table-regulations").remove();
                    showCardLoader();
                    showRegulationCategoriesTable();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idCategory = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/regulation/modal-edit/" + idCategory,
        success: function (response) {
            // Get data category from response json
            $("#edit-regulation-id").val(response.dataEdit.id);
            $("#edit-regulation").val(response.dataEdit.category);

            $(".overlay-modal-edit-regulation").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-regulation")
    .on("submit")
    .validate({
        rules: {
            edit_regulation: {
                required: true,
            },
        },
        messages: {
            edit_regulation: {
                required: "Masukkan kategori regulasi.",
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
            $("#btn-edit-regulation").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-regulation").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/regulation/edit",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori regulasi berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-regulation").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-edit-regulation").text("Simpan");
                    $("#btn-edit-regulation").attr("disabled", false);
                    $("#table-regulation-categories").remove();
                    closeModalEdit();
                    showCardLoader();
                    showRegulationCategoriesTable();
                },
            });
        },
    });

// Show Delete Modal
$(document).on("click", ".delete", function () {
    const idEditCategory = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/regulation/modal-delete/" + idEditCategory,
        success: function (response) {
            // Get data category from response json
            $("#delete-regulation-id").val(response.dataDelete.id);
            $(".card-body-delete-regulation").append(
                "<p>Anda yakin untuk menghapus kategori regulasi : <strong>" +
                    response.dataDelete.category +
                    "</strong>?</p>\
                    <p class='text-danger font-italic'>Apabila kategori regulasi dihapus, maka daftar regulasi yang berada dalam kategori regulasi ini akan terhapus semua.</p>"
            );

            $(".overlay-modal-delete-regulation").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-regulation").on("submit", function (e) {
    e.preventDefault();

    const idDeleteCategory = $("#delete-regulation-id").val();

    $("#btn-delete-regulation").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-regulation").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/master-data/regulation/delete/" + idDeleteCategory,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus kategori regulasi.",
            });
            $("#modal-delete-regulation").modal("hide");
            $(".card-body-delete-regulation").html("");
            $("#btn-delete-regulation").text("Hapus");
            $("#btn-delete-regulation").attr("disabled", false);
            $("#table-regulation-categories").remove();
            closeModalDelete();
            showCardLoader();
            showRegulationCategoriesTable();
        },
    });
});
