$(document).ready(function () {
    "use strict";
    $(".data-list-view").DataTable({
        responsive: !1,
        columnDefs: [{orderable: !0, targets: 0, checkboxes: {selectRow: !0}}],
        dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {sLengthMenu: "_MENU_", sSearch: ""},
        aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
        select: {style: "multi"},
        order: [[1, "asc"]],
        bInfo: !1,
        pageLength: 4,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Add New", action: function () {
                $(this).removeClass("btn-secondary"), $(".add-new-data").addClass("show"), $(".overlay-bg").addClass("show"), $("#data-name, #data-price").val(""), $("#data-category, #data-status").prop("selectedIndex", 0)
            }, className: "btn-outline-primary"
        }],
        initComplete: function (t, e) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
    }).on("draw.dt", function () {
        setTimeout(function () {
            -1 != navigator.userAgent.indexOf("Mac OS X") && $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
        }, 50)
    }), $(".data-thumb-view").DataTable({
        responsive: !1,
        // columnDefs: [{orderable: !0, targets: 0, checkboxes: {selectRow: !0}}],
        dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {sLengthMenu: "_MENU_", sSearch: ""},
        aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
        select: {style: "multi"},
        // order: [[1, "desc"]],
        bInfo: !1,
        pageLength: 4,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Thêm mới", action: function () {
                $(this).removeClass("btn-secondary"), $(".add-new-data").addClass("show"), $(".overlay-bg").addClass("show")
            }, className: "btn-outline-primary"
        }],
        initComplete: function (t, e) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
    }).on("draw.dt", function () {
        setTimeout(function () {
            -1 != navigator.userAgent.indexOf("Mac OS X") && $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
        }, 50)
    }), $(".actions-dropodown").insertBefore($(".top .actions .dt-buttons")), $(".data-items").length > 0 && new PerfectScrollbar(".data-items", {wheelPropagation: !1}), $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function () {
        $(".add-new-data").removeClass("show"), $(".overlay-bg").removeClass("show"), $("#data-name, #data-price").val(""), $("#data-category, #data-status").prop("selectedIndex", 0)
    }), $(".action-edit").on("click", function (t) {
        t.stopPropagation(), $("#data-name").val("Altec Lansing - Bluetooth Speaker"), $("#data-price").val("$99"), $(".add-new-data").addClass("show"), $(".overlay-bg").addClass("show")
    }), $(".action-delete").on("click", function (t) {
        t.stopPropagation(), $(this).closest("td").parent("tr").fadeOut()
    }), Dropzone.options.dataListUpload = {
        complete: function (t) {
            $(".hide-data-sidebar, .cancel-data-btn, .actions .dt-buttons").on("click", function () {
                $(".dropzone")[0].dropzone.files.forEach(function (t) {
                    t.previewElement.remove()
                }), $(".dropzone").removeClass("dz-started")
            })
        }
    }, Dropzone.options.dataListUpload.complete(), -1 != navigator.userAgent.indexOf("Mac OS X") && $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
});
