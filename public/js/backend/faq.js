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
    $("#modal-body-edit-faq").append(
        '<div class="overlay overlay-modal-edit-faq">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-edit").on("click", function () {
    $("#form-edit-faq").find("textarea").val("");
    closeModalEdit();

    $("#edit-profile").val("");
});

// Close Modal Delete
function closeModalDelete() {
    $("#card-modal-delete-faq").append(
        '<div class="overlay overlay-modal-delete-faq">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
}
$(".close-modal-delete").on("click", function () {
    closeModalDelete();

    $(".card-body-delete-faq").html("");
});

// Close Modal
$(".close").on("click", function () {
    $(".error").remove();
    $(".form-control").removeClass("is-invalid");
    $("#modal-read-body").html("");
    $("#modal-read-body").append(
        '<div class="overlay overlay-modal-read-faq">\
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>\
        </div>'
    );
});

dtFaqs();
function dtFaqs() {
    $("#dtFaqs").DataTable({
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
            url: "/admin/faq",
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
                data: "question",
                name: "question",
            },
            {
                data: "answer",
                name: "answer",
                render: function (data, type, row) {
                    var str = data;
                    var regex = /<br\s*[\/]?>/gi;
                    return str.replace(regex, "");
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
                width: "40%",
                className: "table-cell",
                targets: [2],
            },
            {
                width: "15%",
                className: "text-center",
                targets: [0, 3],
            },
        ],
        initComplete: function () {
            $(".datatables thead th").addClass("text-center");
        },
    });
}

// Submit Add Form
$("#form-add-faq")
    .on("submit")
    .validate({
        rules: {
            add_question: {
                required: true,
            },
            add_answer: {
                required: true,
            },
        },
        messages: {
            add_question: {
                required: "Masukkan pertanyaan.",
            },
            add_answer: {
                required: "Masukkan jawaban.",
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
            $("#btn-add-faq").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-add-faq").attr("disabled", true);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/faq/add",
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data faq berhasil tersimpan.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-add-faq").modal("hide");
                    $("#form-add-faq").find("textarea").val("");
                    $("#btn-add-faq").text("Simpan");
                    $("#btn-add-faq").attr("disabled", false);
                    $("#dtFaqs").DataTable().ajax.reload();
                },
            });
        },
    });

// Read FAQ
$(document).on("click", ".read", function () {
    let idReadFaq = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/faq/read-faq/" + idReadFaq,
        success: function (response) {
            console.log(response.data);
            // Get data FAQ by id from response json
            $("#modal-read-body").append(
                "<h3>" +
                    response.data.question +
                    "</h3>\
                <p>" +
                    response.data.answer +
                    "</p>"
            );

            $(".overlay-modal-read-faq").remove();
        },
    });
});

// Show Edit Modal
$(document).on("click", ".edit", function () {
    const idFaq = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/admin/faq/modal-edit/" + idFaq,
        success: function (response) {
            // Get data category from response json
            $("#edit-faq-id").val(response.dataEdit.id);
            $("#edit-question").val(response.dataEdit.question);
            $("#edit-answer").val(response.dataEdit.answer);
            var str = $("#edit-answer").val();
            var regex = /<br\s*[\/]?>/gi;
            $("#edit-answer").val(str.replace(regex, ""));

            $(".overlay-modal-edit-faq").remove();
        },
    });
});

// Submit Edit Form
$("#form-edit-faq")
    .on("submit")
    .validate({
        rules: {
            edit_question: {
                required: true,
            },
            edit_answer: {
                required: true,
            },
        },
        messages: {
            edit_question: {
                required: "Masukkan pertanyaan.",
            },
            edit_answer: {
                required: "Masukkan jawaban.",
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
            $("#btn-edit-faq").html(
                '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...'
            );
            $("#btn-edit-faq").attr("disabled", true);

            var id = $("#edit-faq-id").val();

            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "/admin/faq/edit/" + id,
                contentType: false,
                processData: false,
                cache: false,
                data: new FormData($(form)[0]),
                success: function (response) {
                    Toast.fire({
                        icon: "success",
                        title: "Data FAQ berhasil diubah.",
                    });
                },
                error: function (response) {
                    Toast.fire({
                        icon: "error",
                        title: "Koneksi internet terputus, gagal simpan data.",
                    });
                },
                complete: function (response) {
                    $("#modal-edit-faq").modal("hide");
                    $("#form-edit-faq").find("textarea").val("");
                    $("#btn-edit-faq").text("Simpan");
                    $("#btn-edit-faq").attr("disabled", false);
                    $("#dtFaqs").DataTable().ajax.reload();
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
        url: "/admin/faq/modal-delete/" + idDelete,
        success: function (response) {
            // Get data category from response json
            $("#delete-faq-id").val(response.dataDelete.id);
            $(".card-body-delete-faq").append(
                "<p>Anda yakin untuk menghapus FAQ : <strong>" +
                    '"' +
                    response.dataDelete.question +
                    '"' +
                    "</strong>?"
            );

            $(".overlay-modal-delete-faq").remove();
        },
    });
});

// Submit Delete Form
$("#form-delete-faq").on("submit", function (e) {
    e.preventDefault();

    const idDelete = $("#delete-faq-id").val();

    $("#btn-delete-faq").html(
        '<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menghapus...'
    );
    $("#btn-delete-faq").attr("disabled", true);

    $.ajax({
        type: "DELETE",
        url: "/admin/faq/delete/" + idDelete,
        success: function (response) {
            Toast.fire({
                icon: "success",
                title: "Berhasil hapus faq.",
            });
            $("#modal-delete-faq").modal("hide");
            $(".card-body-delete-faq").html("");
            $("#btn-delete-faq").text("Hapus");
            $("#btn-delete-faq").attr("disabled", false);
            $("#dtFaqs").DataTable().ajax.reload();
            closeModalDelete();
        },
    });
});
