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
    $("#card-table-anytime-information").append(
        '<div class="overlay overlay-table-anytime-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#card-modal-edit-anytime-information").append(
        '<div class="overlay overlay-modal-edit-anytime-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    closeModalEdit();

    $("#edit-anytime-information").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-anytime-information").append(
        '<div class="overlay overlay-modal-delete-anytime-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-anytime-information").html("");
});

// Close Modal
$(".close").on("click", function () {
    $("#form-add-anytime-information").find("input").val("");
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
});

// Show Table of Parent Public Information List Categories
showAnytimeInformationCategoriesTable();

function showAnytimeInformationCategoriesTable() {
    $("#card-body-table-anytime-information").html("");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/pi/anytime-information/show-anytime-information",
        success: function (response) {
            // Get all data category from response json
            if (response.data != "") {
                $("#card-body-table-anytime-information").append(
                    '<table id="table-anytime-informations" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th>Kategori Informasi Setiap Saat</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-anytime-informations"></tbody>\
                    </table>'
                );
                $.each(response.data, function (key, value) {
                    $("#table-body-anytime-informations").append(
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
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-anytime-information"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-anytime-information"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-anytime-information").append(
                    "<p>Belum ada Data</p>"
                );
            }
            $(".overlay-table-anytime-information").remove();
        },
    });
}

// Submit Add Form
$("#form-add-anytime-information")
    .on("submit")
    .validate({
        rules: {
            add_anytime_information: {
                required: true,
            },
        },
        messages: {
            add_anytime_information: {
                required: "Masukkan kategori informasi setiap saat.",
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
            $("#btn-add-anytime-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-anytime-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/anytime-information/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi setiap saat berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-anytime-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-add-anytime-information").text("Simpan");
                    $("#btn-add-anytime-information").attr("disabled", false);
                    $("#table-anytime-informations").remove();
                    showCardLoader();
                    showAnytimeInformationCategoriesTable();
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
            "/admin/master-data/pi/anytime-information/modal-edit/" +
            idCategory,
        success: function (response) {
            // Get data category from response json
            $("#edit-anytime-information-id").val(response.dataEdit.id);
            $("#edit-anytime-information").val(response.dataEdit.category);

            $(".overlay-modal-edit-anytime-information").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-anytime-information")
    .on("submit")
    .validate({
        rules: {
            edit_anytime_information: {
                required: true,
            },
        },
        messages: {
            edit_anytime_information: {
                required: "Masukkan kategori informasi berkala.",
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
            $("#btn-edit-anytime-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-anytime-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/anytime-information/edit",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi berkala berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-anytime-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-edit-anytime-information").text("Simpan");
                    $("#btn-edit-anytime-information").attr("disabled", false);
                    $("#table-anytime-information-categories").remove();
                    closeModalEdit();
                    showCardLoader();
                    showAnytimeInformationCategoriesTable();
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
            "/admin/master-data/pi/anytime-information/modal-delete/" +
            idEditCategory,
        success: function (response) {
            // Get data category from response json
            $("#delete-anytime-information-id").val(response.dataDelete.id);
            $(".card-body-delete-anytime-information").append(
                "<p>Anda yakin untuk menghapus kategori informasi setiap saat : <strong>" +
                    response.dataDelete.category +
                    "</strong>?</p>\
                    <p class='text-danger font-italic'>Apabila kategori informasi setiap saat dihapus, maka data turunan informasi setiap saat ini akan terhapus semua.</p>"
            );

            $(".overlay-modal-delete-anytime-information").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-anytime-information").on("submit", function (e) {
    e.preventDefault();

    const idDeleteCategory = $("#delete-anytime-information-id").val();

    $("#btn-delete-anytime-information").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-anytime-information").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url:
            "/admin/master-data/pi/anytime-information/delete/" +
            idDeleteCategory,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus kategori informasi setiap saat.",
            });
            $("#modal-delete-anytime-information").modal("hide");
            $(".card-body-delete-anytime-information").html("");
            $("#btn-delete-anytime-information").text("Hapus");
            $("#btn-delete-anytime-information").attr("disabled", false);
            $("#table-anytime-information-categories").remove();
            closeModalDelete();
            showCardLoader();
            showAnytimeInformationCategoriesTable();
        },
    });
});
