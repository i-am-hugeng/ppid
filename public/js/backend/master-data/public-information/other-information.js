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
    $("#card-table-other-information").append(
        '<div class="overlay overlay-table-other-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#card-modal-edit-other-information").append(
        '<div class="overlay overlay-modal-edit-other-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    closeModalEdit();

    $("#edit-other-information").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-other-information").append(
        '<div class="overlay overlay-modal-delete-other-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-other-information").html("");
});

// Close Modal
$(".close").on("click", function () {
    $("#form-add-other-information").find("input").val("");
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
});

// Show Table of Parent Public Information List Categories
showOtherInformationCategoriesTable();

function showOtherInformationCategoriesTable() {
    $("#card-body-table-other-information").html("");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/pi/other-information/show-other-information",
        success: function (response) {
            // Get all data category from response json
            if (response.data != "") {
                $("#card-body-table-other-information").append(
                    '<table id="table-other-informations" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th>Kategori Informasi lainnya</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-other-informations"></tbody>\
                    </table>'
                );
                $.each(response.data, function (key, value) {
                    $("#table-body-other-informations").append(
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
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-other-information"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-other-information"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-other-information").append(
                    "<p>Belum ada Data</p>"
                );
            }
            $(".overlay-table-other-information").remove();
        },
    });
}

// Submit Add Form
$("#form-add-other-information")
    .on("submit")
    .validate({
        rules: {
            add_other_information: {
                required: true,
            },
        },
        messages: {
            add_other_information: {
                required: "Masukkan kategori informasi lainnya.",
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
            $("#btn-add-other-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-other-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/other-information/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi lainnya berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-other-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-add-other-information").text("Simpan");
                    $("#btn-add-other-information").attr("disabled", false);
                    $("#table-other-informations").remove();
                    showCardLoader();
                    showOtherInformationCategoriesTable();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idCategory = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/pi/other-information/modal-edit/" + idCategory,
        success: function (response) {
            // Get data category from response json
            $("#edit-other-information-id").val(response.dataEdit.id);
            $("#edit-other-information").val(response.dataEdit.category);

            $(".overlay-modal-edit-other-information").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-other-information")
    .on("submit")
    .validate({
        rules: {
            edit_other_information: {
                required: true,
            },
        },
        messages: {
            edit_other_information: {
                required: "Masukkan kategori informasi lainnya.",
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
            $("#btn-edit-other-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-other-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/other-information/edit",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi lainnya berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-other-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-edit-other-information").text("Simpan");
                    $("#btn-edit-other-information").attr("disabled", false);
                    $("#table-other-information-categories").remove();
                    closeModalEdit();
                    showCardLoader();
                    showOtherInformationCategoriesTable();
                },
            });
        },
    });

// Show Delete Modal
$(document).on("click", ".delete", function () {
    const idEditCategory = $(this).attr("id");

    $.ajax({
        type: "GET",
        url:
            "/admin/master-data/pi/other-information/modal-delete/" +
            idEditCategory,
        success: function (response) {
            // Get data category from response json
            $("#delete-other-information-id").val(response.dataDelete.id);
            $(".card-body-delete-other-information").append(
                "<p>Anda yakin untuk menghapus kategori informasi lainnya : <strong>" +
                    response.dataDelete.category +
                    "</strong>?</p>\
                    <p class='text-danger font-italic'>Apabila kategori informasi lainnya dihapus, maka data turunan informasi lainnya ini akan terhapus semua.</p>"
            );

            $(".overlay-modal-delete-other-information").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-other-information").on("submit", function (e) {
    e.preventDefault();

    const idDeleteCategory = $("#delete-other-information-id").val();

    $("#btn-delete-other-information").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-other-information").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url:
            "/admin/master-data/pi/other-information/delete/" +
            idDeleteCategory,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus kategori informasi lainnya.",
            });
            $("#modal-delete-other-information").modal("hide");
            $(".card-body-delete-other-information").html("");
            $("#btn-delete-other-information").text("Hapus");
            $("#btn-delete-other-information").attr("disabled", false);
            $("#table-other-information-categories").remove();
            closeModalDelete();
            showCardLoader();
            showOtherInformationCategoriesTable();
        },
    });
});
