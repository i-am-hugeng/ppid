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

// Close Modal Edit
function closeModalEdit() {
    $("#modal-body-edit").append(
        '<div class="overlay overlay-modal-edit">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    $("#edit-category").prop("selectedIndex", 0);
    $("#form-edit").find("textarea").val("");
    $("#form-edit").find("input").val("");
    closeModalEdit();
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete").append(
        '<div class="overlay overlay-modal-delete">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete").html("");
});

//close modal
$(".close").on("click", function () {
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
    $("#add-category").prop("selectedIndex", 0);
    $("#form-add").find("textarea").val("");
    $("#form-add").find("input").val("");
});

dtAnytimeInformation();
function dtAnytimeInformation() {
    $("#dtAnytimeInformation").DataTable({
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        language: {
            url: "/json/id.json",
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/public-information/anytime-information-list",
            type: "GET",
        },
        dom: "Bfrtip",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                searchable: false,
                orderable: false,
            },
            {
                data: "description",
                name: "description",
            },
            {
                data: "category",
                name: "category",
            },
            {
                data: "url",
                name: "url",
                render: function (data, type, row) {
                    return (
                        '<a href="' +
                        row.url +
                        '" target="_blank">' +
                        row.url +
                        "</a>"
                    );
                },
            },
            {
                data: "aksi",
                name: "aksi",
                orderable: false,
                searchable: false,
            },
        ],
        columnDefs: [
            {
                targets: [1, 2],
                width: "25%",
            },
            {
                targets: [0],
                width: "7%",
            },
            {
                className: "table-cell",
                targets: 3,
            },
            {
                className: "text-center",
                targets: [0, 4],
            },
        ],
        initComplete: function () {
            $(".datatables thead th").addClass("text-center");
        },
    });
}

// Submit Add Form
$("#form-add")
    .on("submit")
    .validate({
        rules: {
            add_category: {
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
            add_category: {
                required: "Pilih kategori informasi.",
            },
            add_description: {
                required: "Masukkan deskripsi informasi.",
            },
            add_url: {
                required: "Masukkan url informasi.",
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
            $("#btn-add").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/public-information/anytime-information-list/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data daftar informasi setiap saat berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add").modal("hide");
                    $("#add-category").prop("selectedIndex", 0);
                    $("#form-add").find("textarea").val("");
                    $("#form-add").find("input").val("");
                    $("#btn-add").text("Simpan");
                    $("#btn-add").attr("disabled", false);
                    $("#dtAnytimeInformation").DataTable().ajax.reload();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url:
            "/admin/public-information/anytime-information-list/modal-edit/" +
            id,
        success: function (response) {
            // Get data category from response json
            $("#edit-id").val(response.dataEdit.id);
            $(
                '#edit-category option[value="' +
                    response.dataEdit.parent_id +
                    '"]'
            ).prop("selected", true);
            $("#edit-description").val(response.dataEdit.description);
            $("#edit-url").val(response.dataEdit.url);
            $(".overlay-modal-edit").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit")
    .on("submit")
    .validate({
        rules: {
            edit_category: {
                required: true,
            },
            edit_description: {
                required: true,
            },
            edit_url: {
                required: true,
                maxlength: 250,
            },
        },
        messages: {
            edit_category: {
                required: "Pilih kategori informasi.",
            },
            edit_description: {
                required: "Masukkan deskripsi informasi.",
            },
            edit_url: {
                required: "Masukkan url informasi.",
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
            $("#btn-edit").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit").attr("disabled", true);

            var id = $("#edit-id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url:
                    "/admin/public-information/anytime-information-list/edit/" +
                    id,
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data daftar informasi setiap saat berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit").modal("hide");
                    $("#edit-category").prop("selectedIndex", 0);
                    $("#form-edit").find("textarea").val("");
                    $("#form-edit").find("input").val("");
                    $("#btn-edit").text("Simpan");
                    $("#btn-edit").attr("disabled", false);
                    $("#dtAnytimeInformation").DataTable().ajax.reload();
                    closeModalEdit();
                },
            });
        },
    });

// Show Delete Modal
$(document).on("click", ".delete", function () {
    const id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url:
            "/admin/public-information/anytime-information-list/modal-delete/" +
            id,
        success: function (response) {
            // Get data category from response json
            $("#delete-id").val(response.dataDelete.id);
            $(".card-body-delete").append(
                "<p>Anda yakin untuk menghapus informasi setiap saat : <strong>" +
                    '"' +
                    response.dataDelete.description +
                    '"' +
                    "</strong>?"
            );

            $(".overlay-modal-delete").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete").on("submit", function (e) {
    e.preventDefault();

    const id = $("#delete-id").val();

    $("#btn-delete").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/public-information/anytime-information-list/delete/" + id,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus informasi setiap saat.",
            });
            $("#modal-delete").modal("hide");
            $(".card-body-delete").html("");
            $("#btn-delete").text("Hapus");
            $("#btn-delete").attr("disabled", false);
            $("#dtAnytimeInformation").DataTable().ajax.reload();
            closeModalDelete();
        },
    });
});
