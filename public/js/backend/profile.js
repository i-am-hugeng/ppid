// CSRF Token
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

//custom file input bootstrap
$(function () {
    bsCustomFileInput.init();
});

// Define Toast
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
});

// Define Summernote
$(".summernote").summernote();

$("form").each(function () {
    if ($(this).data("validator"))
        $(this).data("validator").settings.ignore = ".summernote *";
});

// Card loader
function showCardLoader() {
    $("#card-table-profile").append(
        '<div class="overlay overlay-table-profile">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#modal-body-edit-profile").append(
        '<div class="overlay overlay-modal-edit-profile">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    $("#form-edit-profile").find("textarea").val("");
    $("#form-edit-profile").find("input").val("");
    $("#edit-img").next("label").html("Pilih gambar (jika tersedia)");
    closeModalEdit();

    $("#edit-profile").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-profile").append(
        '<div class="overlay overlay-modal-delete-profile">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-profile").html("");
});

$(".close").on("click", function () {
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
    $("#modal-read-body").html("");
    $("#modal-read-body").append(
        '<div class="overlay overlay-modal-read-profile">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
});

// Show Table of Profiles
showProfilesTable();

function showProfilesTable() {
    $("#card-body-table-profile").html("");

    $.ajax({
        type: "GET",
        url: "/admin/profile/show-profiles",
        success: function (response) {
            // Get all data profiles from response json
            if (response.dataProfile != "") {
                $("#card-body-table-profile").append(
                    '<table id="table-profiles" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 5%">#</th>\
                                <th style="width: 20%">Judul</th>\
                                <th style="max-width: 50%">Deskripsi</th>\
                                <th style="width: 20%">Aksi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-profile"></tbody>\
                    </table>'
                );
                $.each(response.dataProfile, function (key, value) {
                    $("#table-body-profile").append(
                        '<tr>\
                            <td class="text-center">' +
                            (key + 1) +
                            "</td>\
                            <td>" +
                            value.title +
                            "</td>\
                            <td>" +
                            // value.description +
                            (value.description.length >= 200
                                ? value.description.substr(0, 200) + "..."
                                : value.description) +
                            '</td>\
                            <td class="text-center">\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-info mr-2 read" title="detail" data-toggle="modal" data-target="#modal-read-profile"><i class="fas fa-eye"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-orange mr-2 edit" title="Edit" data-toggle="modal" data-target="#modal-edit-profile"><i class="fas fa-pencil"></i></button>\
                                <button id="' +
                            value.id +
                            '" class="btn btn-sm bg-gradient-danger mr-2 delete" title="Hapus" data-toggle="modal" data-target="#modal-delete-profile"><i class="fas fa-trash"></i></button>\
                            </td>\
                        </tr>'
                    );
                });
            } else {
                $("#card-body-table-profile").append("<p>Belum ada Data</p>");
            }
            $(".overlay-table-profile").remove();
        },
    });
}

// Submit Add Form
$("#form-add-profile")
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
                required: "Masukkan judul profil.",
            },
            add_description: {
                required: "Masukkan deskripsi profil.",
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
            $("#btn-add-profile").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-profile").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/profile/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data profil berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-profile").modal("hide");
                    $("#form-add-profile").find("textarea").val("");
                    $("#form-add-profile").find("input").val("");
                    // $(".summernote").val("");
                    $("#add-img")
                        .next("label")
                        .html("Pilih gambar (jika tersedia)");
                    $("#btn-add-profile").text("Simpan");
                    $("#btn-add-profile").attr("disabled", false);
                    $("#table-profiles").remove();
                    showCardLoader();
                    showProfilesTable();
                },
            });
        },
    });

// Read Profile
$(document).on("click", ".read", function () {
    let idReadProfile = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/profile/read-profile/" + idReadProfile,
        success: function (response) {
            console.log(response.data);
            // Get data profile by id from response json
            if (response.data.img == undefined) {
                $("#modal-read-body").append(
                    "<h3>" +
                        response.data.title +
                        "</h3>\
                <p>" +
                        response.data.description +
                        "</p>"
                );
            } else {
                $("#modal-read-body").append(
                    "<h3>" +
                        response.data.title +
                        "</h3>\
                <p>" +
                        response.data.description +
                        '</p>\
                <img class="img-rounded img-fluid" src="/uploaded-images/' +
                        response.data.img +
                        '" />'
                );
            }

            $(".overlay-modal-read-profile").remove();
        },
    });
});

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idProfile = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/profile/modal-edit/" + idProfile,
        success: function (response) {
            // Get data profile from response json
            $("#edit-profile-id").val(response.dataEdit.id);
            $("#edit-title").val(response.dataEdit.title);
            $("#edit-description").val(response.dataEdit.description);
            var str = $("#edit-description").val();
            var regex = /<br\s*[\/]?>/gi;
            $("#edit-description").val(str.replace(regex, ""));
            if (response.dataEdit.img != undefined) {
                $("#edit-img").next("label").html(response.dataEdit.img);
            }

            $(".overlay-modal-edit-profile").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-profile")
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
                required: "Masukkan judul profil.",
            },
            edit_description: {
                required: "Masukkan deskripsi profil.",
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
            $("#btn-edit-profile").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-profile").attr("disabled", true);

            var id = $("#edit-profile-id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/profile/edit/" + id,
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data profil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-profile").modal("hide");
                    $("#form-edit-profile").find("textarea").val("");
                    $("#form-edit-profile").find("input").val("");
                    // $(".summernote").val("");
                    $("#edit-img")
                        .next("label")
                        .html("Pilih gambar (jika tersedia)");
                    $("#btn-edit-profile").text("Simpan");
                    $("#btn-edit-profile").attr("disabled", false);
                    $("#table-profiles").remove();
                    showCardLoader();
                    showProfilesTable();
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
        url: "/admin/profile/modal-delete/" + idDelete,
        success: function (response) {
            // Get data category from response json
            $("#delete-profile-id").val(response.dataDelete.id);
            $(".card-body-delete-profile").append(
                "<p>Anda yakin untuk menghapus profil : <strong>" +
                    response.dataDelete.title +
                    "</strong>?"
            );

            $(".overlay-modal-delete-profile").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-profile").on("submit", function (e) {
    e.preventDefault();

    const idDelete = $("#delete-profile-id").val();

    $("#btn-delete-profile").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-profile").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/profile/delete/" + idDelete,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus profil.",
            });
            $("#modal-delete-profile").modal("hide");
            $(".card-body-delete-profile").html("");
            $("#btn-delete-profile").text("Hapus");
            $("#btn-delete-profile").attr("disabled", false);
            $("#table-profiles").remove();
            closeModalDelete();
            showCardLoader();
            showProfilesTable();
        },
    });
});
