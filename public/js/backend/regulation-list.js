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
    $("#card-table-regulation-list").append(
        '<div class="overlay overlay-table-regulation-list">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}

// Close Modal Edit
function closeModalEdit() {
    $("#modal-body-edit-regulation-list").append(
        '<div class="overlay overlay-modal-edit-regulation-list">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    $("#edit-regulation-category").prop("selectedIndex", 0);
    $("#form-edit-regulation-list").find("textarea").val("");
    $("#form-edit-regulation-list").find("input").val("");
    closeModalEdit();
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-regulation-list").append(
        '<div class="overlay overlay-modal-delete-regulation-list">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-regulation-list").html("");
});

$(".close").on("click", function () {
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
    $("#add-regulation-category").prop("selectedIndex", 0);
    $("#form-add-regulation-list").find("textarea").val("");
    $("#form-add-regulation-list").find("input").val("");
});

// Show Datatable of Regulation Lists
dtRegulationLists();
function dtRegulationLists() {
    $("#dtRegulationLists").DataTable({
        ordering: true,
        info: true,
        responsive: true,
        language: {
            url: "/json/id.json",
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/regulation-list",
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
                data: "category",
                name: "category",
            },
            {
                data: "regulation_number",
                name: "regulation_number",
            },
            {
                data: "regulation_about",
                name: "regulation_about",
            },
            {
                data: "regulation_url",
                name: "regulation_url",
                render: function (data, type, row) {
                    return (
                        '<a href="' +
                        row.regulation_url +
                        '" target="_blank">' +
                        row.regulation_url +
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
                targets: [0],
                width: "7%",
            },
            {
                targets: 5,
                width: "10%",
            },
            {
                targets: 4,
                width: "25%",
            },
            {
                className: "table-cell",
                targets: 4,
            },
            {
                className: "text-center",
                targets: [0, 5],
            },
        ],
        initComplete: function () {
            $(".datatables thead th").addClass("text-center");
        },
    });
}

// Submit Add Form
$("#form-add-regulation-list")
    .on("submit")
    .validate({
        rules: {
            add_regulation_category: {
                required: true,
            },
            add_regulation_number: {
                required: true,
            },
            add_regulation_about: {
                required: true,
            },
            add_regulation_url: {
                required: true,
                maxlength: 250,
            },
        },
        messages: {
            add_regulation_category: {
                required: "Pilih kategori regulasi.",
            },
            add_regulation_number: {
                required: "Masukkan nomor regulasi.",
            },
            add_regulation_about: {
                required: "Masukkan judul regulasi.",
            },
            add_regulation_url: {
                required: "Masukkan url unduh regulasi.",
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
            $("#btn-add-regulation-list").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-regulation-list").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/regulation-list/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data daftar regulasi berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-regulation-list").modal("hide");
                    $("#add-regulation-category").prop("selectedIndex", 0);
                    $("#form-add-regulation-list").find("textarea").val("");
                    $("#form-add-regulation-list").find("input").val("");
                    $("#btn-add-regulation-list").text("Simpan");
                    $("#btn-add-regulation-list").attr("disabled", false);
                    $("#dtRegulationLists").DataTable().ajax.reload();
                },
            });
        },
    });

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idRegulationList = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/regulation-list/modal-edit/" + idRegulationList,
        success: function (response) {
            // Get data category from response json
            $("#edit-regulation-list-id").val(response.dataEdit.id);
            $(
                '#edit-regulation-category option[value="' +
                    response.dataEdit.regulation_id +
                    '"]'
            ).prop("selected", true);
            $("#edit-regulation-number").val(
                response.dataEdit.regulation_number
            );
            $("#edit-regulation-about").val(response.dataEdit.regulation_about);
            $("#edit-regulation-url").val(response.dataEdit.regulation_url);
            $(".overlay-modal-edit-regulation-list").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-regulation-list")
    .on("submit")
    .validate({
        rules: {
            edit_regulation_category: {
                required: true,
            },
            edit_regulation_number: {
                required: true,
            },
            edit_regulation_about: {
                required: true,
            },
            edit_regulation_url: {
                required: true,
                maxlength: 250,
            },
        },
        messages: {
            edit_regulation_category: {
                required: "Pilih kategori regulasi.",
            },
            edit_regulation_number: {
                required: "Masukkan nomor regulasi.",
            },
            edit_regulation_about: {
                required: "Masukkan judul regulasi.",
            },
            edit_regulation_url: {
                required: "Masukkan url unduh regulasi.",
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
            $("#btn-edit-regulation-list").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-regulation-list").attr("disabled", true);

            var id = $("#edit-regulation-list-id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/regulation-list/edit/" + id,
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data Daftar Regulasi berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-regulation-list").modal("hide");
                    $("#edit-regulation-category").prop("selectedIndex", 0);
                    $("#form-edit-regulation-list").find("textarea").val("");
                    $("#form-edit-regulation-list").find("input").val("");
                    $("#btn-edit-regulation-list").text("Simpan");
                    $("#btn-edit-regulation-list").attr("disabled", false);
                    $("#dtRegulationLists").DataTable().ajax.reload();
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
        url: "/admin/regulation-list/modal-delete/" + idDelete,
        success: function (response) {
            // Get data category from response json
            $("#delete-regulation-list-id").val(response.dataDelete.id);
            $(".card-body-delete-regulation-list").append(
                "<p>Anda yakin untuk menghapus daftar regulasi : <strong>" +
                    '"' +
                    response.dataDelete.regulation_number +
                    '"' +
                    "</strong>?"
            );

            $(".overlay-modal-delete-regulation-list").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-regulation-list").on("submit", function (e) {
    e.preventDefault();

    const idDelete = $("#delete-regulation-list-id").val();

    $("#btn-delete-regulation-list").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-regulation-list").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/regulation-list/delete/" + idDelete,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus daftar regulasi.",
            });
            $("#modal-delete-regulation-list").modal("hide");
            $(".card-body-delete-regulation-list").html("");
            $("#btn-delete-regulation-list").text("Hapus");
            $("#btn-delete-regulation-list").attr("disabled", false);
            $("#dtRegulationLists").DataTable().ajax.reload();
            closeModalDelete();
        },
    });
});
