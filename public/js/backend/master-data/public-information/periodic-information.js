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
    $("#card-table-periodic-information").append(
        '<div class="overlay overlay-table-periodic-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#card-modal-edit-periodic-information").append(
        '<div class="overlay overlay-modal-edit-periodic-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    closeModalEdit();

    $("#edit-periodic-information").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-periodic-information").append(
        '<div class="overlay overlay-modal-delete-periodic-information">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-periodic-information").html("");
});

// Close Modal
$(".close").on("click", function () {
    $("#form-add-periodic-information").find("input").val("");
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
});

// Show Table of Parent Public Information List Categories
showPeriodicInformationCategoriesTable();

function showPeriodicInformationCategoriesTable() {
    $("#card-body-table-periodic-information").html("");

    $.ajax({
        type: "GET",
        url: "/admin/master-data/pi/periodic-information/show-periodic-information",
        success: function (response) {
            // Get all data category from response json
            if (response.data != "") {
                $("#card-body-table-periodic-information").append(
                    '<table id="table-periodic-informations" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th>Kategori Informasi Berkala</th>\
                                <th style="width: 15%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-periodic-informations"></tbody>\
                    </table>'
                );
                $.each(response.data, function (key, value) {
                    $("#table-body-periodic-informations").append(
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
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-periodic-information"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-periodic-information"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-periodic-information").append(
                    "<p>Belum ada Data</p>"
                );
            }
            $(".overlay-table-periodic-information").remove();
        },
    });
}

// Submit Add Form
$("#form-add-periodic-information")
    .on("submit")
    .validate({
        rules: {
            add_periodic_information: {
                required: true,
            },
        },
        messages: {
            add_periodic_information: {
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
            $("#btn-add-periodic-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-periodic-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/periodic-information/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data kategori informasi berkala berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-periodic-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-add-periodic-information").text("Simpan");
                    $("#btn-add-periodic-information").attr("disabled", false);
                    $("#table-periodic-informations").remove();
                    showCardLoader();
                    showPeriodicInformationCategoriesTable();
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
            "/admin/master-data/pi/periodic-information/modal-edit/" +
            idCategory,
        success: function (response) {
            // Get data category from response json
            $("#edit-periodic-information-id").val(response.dataEdit.id);
            $("#edit-periodic-information").val(response.dataEdit.category);

            $(".overlay-modal-edit-periodic-information").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-periodic-information")
    .on("submit")
    .validate({
        rules: {
            edit_periodic_information: {
                required: true,
            },
        },
        messages: {
            edit_periodic_information: {
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
            $("#btn-edit-periodic-information").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-periodic-information").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/master-data/pi/periodic-information/edit",
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
                    $("#modal-edit-periodic-information").modal("hide");
                    $("input[type=text]").val("");
                    $("#btn-edit-periodic-information").text("Simpan");
                    $("#btn-edit-periodic-information").attr("disabled", false);
                    $("#table-periodic-information-categories").remove();
                    closeModalEdit();
                    showCardLoader();
                    showPeriodicInformationCategoriesTable();
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
            "/admin/master-data/pi/periodic-information/modal-delete/" +
            idEditCategory,
        success: function (response) {
            // Get data category from response json
            $("#delete-periodic-information-id").val(response.dataDelete.id);
            $(".card-body-delete-periodic-information").append(
                "<p>Anda yakin untuk menghapus kategori informasi berkala : <strong>" +
                    response.dataDelete.category +
                    "</strong>?</p>\
                    <p class='text-danger font-italic'>Apabila kategori informasi berkala dihapus, maka data turunan informasi berkala ini akan terhapus semua.</p>"
            );

            $(".overlay-modal-delete-periodic-information").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-periodic-information").on("submit", function (e) {
    e.preventDefault();

    const idDeleteCategory = $("#delete-periodic-information-id").val();

    $("#btn-delete-periodic-information").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-periodic-information").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url:
            "/admin/master-data/pi/periodic-information/delete/" +
            idDeleteCategory,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus kategori informasi berkala.",
            });
            $("#modal-delete-periodic-information").modal("hide");
            $(".card-body-delete-periodic-information").html("");
            $("#btn-delete-periodic-information").text("Hapus");
            $("#btn-delete-periodic-information").attr("disabled", false);
            $("#table-periodic-information-categories").remove();
            closeModalDelete();
            showCardLoader();
            showPeriodicInformationCategoriesTable();
        },
    });
});
