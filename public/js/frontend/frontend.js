function closeModal() {
    $(".modal-body-regulation-list").html("");
    $(".modal-body-public-information-list").html("");
    $(".modal-body-anytime-information-list").html("");
    $(".modal-body-periodic-information-list").html("");
    $(".modal-body-immediately-information-list").html("");
    $(".modal-body-other-information-list").html("");
}

$(document).on("click", ".regulation-list", function () {
    $(".preloader-modal").attr("hidden", false);

    var id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/modal-regulation-list/" + id,
        success: function (response) {
            $("#title-regulation-modal").html(response.category.category);

            $(".modal-body-regulation-list").append(
                '<div class="container">\
                    <table id="table-regulation-list" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 40%">Nomor Regulasi</th>\
                                <th style="width: 60%">Judul Regulasi</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-regulation-list"></tbody>\
                    </table>\
                </div>'
            );

            $.each(response.regulation, function (key, value) {
                $("#table-body-regulation-list").append(
                    '<tr>\
                      <td><a href="' +
                        value.regulation_url +
                        '" target="_blank">' +
                        value.regulation_number +
                        "</a></td>\
                      <td>" +
                        value.regulation_about +
                        "</td>\
                    </tr>"
                );
            });

            $(".preloader-modal").attr("hidden", true);
            $("#modal-read-regulation-list").modal("show");
        },
    });
});

$(document).on("click", ".anytime-information-list", function () {
    $(".preloader-modal").attr("hidden", false);

    var id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/modal-anytime-information-list/" + id,
        success: function (response) {
            $("#title-anytime-information-modal").html(
                response.category.category
            );

            $(".modal-body-anytime-information-list").append(
                '<div class="container mt-2">\
                    <table id="table-anytime-information-list" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 70%">Deskripsi Informasi</th>\
                                <th style="width: 20%">URL</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-anytime-information-list"></tbody>\
                    </table>\
                </div>'
            );

            $.each(response.items, function (key, value) {
                $("#table-body-anytime-information-list").append(
                    "<tr>\
                        <td>" +
                        value.description +
                        '</td>\
                      <td class="text-center"><a href="' +
                        value.url +
                        '" target="_blank">Lihat / Unduh</a></td>\
                    </tr>'
                );
            });

            $(".preloader-modal").attr("hidden", true);
            $("#modal-read-anytime-information-list").modal("show");
        },
    });
});

$(document).on("click", ".periodic-information-list", function () {
    $(".preloader-modal").attr("hidden", false);

    var id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/modal-periodic-information-list/" + id,
        success: function (response) {
            $("#title-periodic-information-modal").html(
                response.category.category
            );

            $(".modal-body-periodic-information-list").append(
                '<div class="container mt-2">\
                    <table id="table-periodic-information-list" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 70%">Deskripsi Informasi</th>\
                                <th style="width: 20%">URL</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-periodic-information-list"></tbody>\
                    </table>\
                </div>'
            );

            $.each(response.items, function (key, value) {
                $("#table-body-periodic-information-list").append(
                    "<tr>\
                        <td>" +
                        value.description +
                        '</td>\
                      <td class="text-center"><a href="' +
                        value.url +
                        '" target="_blank">Lihat / Unduh</a></td>\
                    </tr>'
                );
            });

            $(".preloader-modal").attr("hidden", true);
            $("#modal-read-periodic-information-list").modal("show");
        },
    });
});

$(document).on("click", ".immediately-information-list", function () {
    $(".preloader-modal").attr("hidden", false);

    var id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/modal-immediately-information-list/" + id,
        success: function (response) {
            $("#title-immediately-information-modal").html(
                response.category.category
            );

            $(".modal-body-immediately-information-list").append(
                '<div class="container mt-2">\
                    <table id="table-immediately-information-list" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 70%">Deskripsi Informasi</th>\
                                <th style="width: 20%">URL</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-immediately-information-list"></tbody>\
                    </table>\
                </div>'
            );

            $.each(response.items, function (key, value) {
                $("#table-body-immediately-information-list").append(
                    "<tr>\
                        <td>" +
                        value.description +
                        '</td>\
                      <td class="text-center"><a href="' +
                        value.url +
                        '" target="_blank">Lihat / Unduh</a></td>\
                    </tr>'
                );
            });

            $(".preloader-modal").attr("hidden", true);
            $("#modal-read-immediately-information-list").modal("show");
        },
    });
});

$(document).on("click", ".other-information-list", function () {
    $(".preloader-modal").attr("hidden", false);

    var id = $(this).attr("id");

    $.ajax({
        type: "GET",
        url: "/modal-other-information-list/" + id,
        success: function (response) {
            $("#title-other-information-modal").html(
                response.category.category
            );

            $(".modal-body-other-information-list").append(
                '<div class="container mt-2">\
                    <table id="table-other-information-list" class="table table-bordered">\
                        <thead>\
                            <tr class="text-center">\
                                <th style="width: 70%">Deskripsi Informasi</th>\
                                <th style="width: 20%">URL</th>\
                            </tr>\
                        </thead>\
                        <tbody id="table-body-other-information-list"></tbody>\
                    </table>\
                </div>'
            );

            $.each(response.items, function (key, value) {
                $("#table-body-other-information-list").append(
                    "<tr>\
                        <td>" +
                        value.description +
                        '</td>\
                      <td class="text-center"><a href="' +
                        value.url +
                        '" target="_blank">Lihat / Unduh</a></td>\
                    </tr>'
                );
            });

            $(".preloader-modal").attr("hidden", true);
            $("#modal-read-other-information-list").modal("show");
        },
    });
});
