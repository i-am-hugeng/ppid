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
    $("#card-table-immediately-information").append(
        '<div class="overlay overlay-table-immediately-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#card-modal-edit-immediately-information").append(
        '<div class="overlay overlay-modal-edit-immediately-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    closeModalEdit();

    $("#edit-immediately-information").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-immediately-information").append(
        '<div class="overlay overlay-modal-delete-immediately-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-immediately-information").html("");
});

// Close Modal
$(".close").on("click", function () {
    $("#form-add-immediately-information").find("input").val("");
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
});

// Show Table of Parent Public Information List Categories
showImmediatelyInformationCategoriesTable();

function showImmediatelyInformationCategoriesTable() {
    $("#card-body-table-immediately-information").html("");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/pi/immediately-information/show-immediately-information",
        success: function (response) {
            // Get all data category from response json
            if (response.data != "") {
                $("#card-body-table-immediately-information").append(
                    '<table id="table-immediately-informations" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th>Kategori Informasi serta merta</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-immediately-informations"></tbody>\
                    </table>'
                );
                $.each(response.data, function (key, value) {
                    $("#table-body-immediately-informations").append(
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
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-immediately-information"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-immediately-information"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-immediately-information").append(
                    "<p>Belum ada Data</p>"
                );
            }
            $(".overlay-table-immediately-information").remove();
        },
    });
}

// Submit Add Form
$("#form-add-immediately-information")
    .on("submit")
    .validate({
        rules: {
            add_immediately_information: {
                required: true,
            },
        },
        messages: {
            add_immediately_information: {
                required: "Masukkan kategori informasi serta merta.",
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
            $("#btn-add-immediately-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-immediately-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/immediately-information/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi serta merta berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-immediately-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-add-immediately-information").text("Simpan");
                    $("#btn-add-immediately-information").attr(
                        "disabled",
                        false
                    );
                    $("#table-immediately-informations").remove();
                    showCardLoader();
                    showImmediatelyInformationCategoriesTable();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idCategory = $(this).attr("id");

    $.ajax({
        type: "GET",
        url:
            "/admin/master-data/pi/immediately-information/modal-edit/" +
            idCategory,
        success: function (response) {
            // Get data category from response json
            $("#edit-immediately-information-id").val(response.dataEdit.id);
            $("#edit-immediately-information").val(response.dataEdit.category);

            $(".overlay-modal-edit-immediately-information").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-immediately-information")
    .on("submit")
    .validate({
        rules: {
            edit_immediately_information: {
                required: true,
            },
        },
        messages: {
            edit_immediately_information: {
                required: "Masukkan kategori informasi serta merta.",
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
            $("#btn-edit-immediately-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-immediately-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/immediately-information/edit",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi serta merta berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-immediately-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-edit-immediately-information").text("Simpan");
                    $("#btn-edit-immediately-information").attr(
                        "disabled",
                        false
                    );
                    $("#table-immediately-information-categories").remove();
                    closeModalEdit();
                    showCardLoader();
                    showImmediatelyInformationCategoriesTable();
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
            "/admin/master-data/pi/immediately-information/modal-delete/" +
            idEditCategory,
        success: function (response) {
            // Get data category from response json
            $("#delete-immediately-information-id").val(response.dataDelete.id);
            $(".card-body-delete-immediately-information").append(
                "<p>Anda yakin untuk menghapus kategori informasi serta merta : <strong>" +
                    response.dataDelete.category +
                    "</strong>?</p>\
                    <p class='text-danger font-italic'>Apabila kategori informasi serta merta dihapus, maka data turunan informasi serta merta ini akan terhapus semua.</p>"
            );

            $(".overlay-modal-delete-immediately-information").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-immediately-information").on("submit", function (e) {
    e.preventDefault();

    const idDeleteCategory = $("#delete-immediately-information-id").val();

    $("#btn-delete-immediately-information").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-immediately-information").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url:
            "/admin/master-data/pi/immediately-information/delete/" +
            idDeleteCategory,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus kategori informasi serta merta.",
            });
            $("#modal-delete-immediately-information").modal("hide");
            $(".card-body-delete-immediately-information").html("");
            $("#btn-delete-immediately-information").text("Hapus");
            $("#btn-delete-immediately-information").attr("disabled", false);
            $("#table-immediately-information-categories").remove();
            closeModalDelete();
            showCardLoader();
            showImmediatelyInformationCategoriesTable();
        },
    });
});
