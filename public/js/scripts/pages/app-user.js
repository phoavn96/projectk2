$(document).ready(function () {
    var e = {
        defaultColDef: {sortable: !0},
        enableRtl: "rtl" == $("html").attr("data-textdirection"),
        columnDefs: [{
            headerName: "ID",
            field: "id",
            width: 125,
            filter: !0,
            checkboxSelection: !0,
            headerCheckboxSelectionFilteredOnly: !0,
            headerCheckboxSelection: !0
        }, {
            headerName: "Username", field: "username", filter: !0, width: 175, cellRenderer: function (e) {
                return "<span class='avatar'><img src='" + e.data.avatar + "' height='32' width='32'></span>" + e.value
            }
        }, {headerName: "Email", field: "email", filter: !0, width: 225}, {
            headerName: "Name",
            field: "name",
            filter: !0,
            width: 200
        }, {headerName: "Country", field: "country", filter: !0, width: 150}, {
            headerName: "Role",
            field: "role",
            filter: !0,
            width: 150
        }, {
            headerName: "Status", field: "status", filter: !0, width: 150, cellRenderer: function (e) {
                return "active" == e.value ? "<div class='badge badge-pill badge-light-success' >" + e.value + "</div>" : "blocked" == e.value ? "<div class='badge badge-pill badge-light-danger' >" + e.value + "</div>" : "deactivated" == e.value ? "<div class='badge badge-pill badge-light-warning' >" + e.value + "</div>" : void 0
            }, cellStyle: {"text-align": "center"}
        }, {
            headerName: "Verified", field: "is_verified", filter: !0, width: 125, cellRenderer: function (e) {
                return 1 == e.value ? "<div class='bullet bullet-sm bullet-success' ></div>" : 0 == e.value ? "<div class='bullet bullet-sm bullet-secondary' ></div>" : void 0
            }, cellStyle: {"text-align": "center"}
        }, {headerName: "Department", field: "department", filter: !0, width: 150}, {
            headerName: "Actions",
            field: "transactions",
            width: 150,
            cellRenderer: function (t) {
                var i = document.createElement("span"), a = document.createElement("i"),
                    l = document.createAttribute("class");
                return l.value = "users-delete-icon feather icon-trash-2", a.setAttributeNode(l), a.addEventListener("click", function () {
                    deleteArr = [t.data], e.api.updateRowData({remove: deleteArr})
                }), i.appendChild($.parseHTML("<a href='app-user-edit'><i class='users-edit-icon feather icon-edit-1 mr-50'></i></a>")[0]), i.appendChild(a), i
            }
        }],
        rowSelection: "multiple",
        floatingFilter: !0,
        filter: !0,
        pagination: !0,
        paginationPageSize: 20,
        pivotPanelShow: "always",
        colResizeDefault: "shift",
        animateRows: !0,
        resizable: !0
    };
    if (document.getElementById("myGrid")) {
        var t = document.getElementById("myGrid");
        agGrid.simpleHttpRequest({url: "data/users-list.json"}).then(function (t) {
            e.api.setRowData(t)
        }), $(".ag-grid-filter").on("keyup", function () {
            var t;
            t = $(this).val(), e.api.setQuickFilter(t)
        }), $(".sort-dropdown .dropdown-item").on("click", function () {
            var t, i = $(this);
            t = i.text(), e.api.paginationSetPageSize(Number(t)), $(".filter-btn").text("1 - " + i.text() + " of 50")
        }), $(".ag-grid-export-btn").on("click", function (t) {
            e.api.exportDataAsCsv()
        });
        var i = function (t, i) {
            var a = null;
            "all" !== i && (a = {
                type: "equals",
                filter: i
            }), e.api.getFilterInstance(t).setModel(a), e.api.onFilterChanged()
        };
        $("#users-list-role").on("change", function () {
            var e = $("#users-list-role").val();
            i("role", e)
        }), $("#users-list-verified").on("change", function () {
            var e = $("#users-list-verified").val();
            i("is_verified", e)
        }), $("#users-list-status").on("change", function () {
            var e = $("#users-list-status").val();
            i("status", e)
        }), $("#users-list-department").on("change", function () {
            var e = $("#users-list-department").val();
            i("department", e)
        }), $(".users-data-filter").click(function () {
            $("#users-list-role").prop("selectedIndex", 0), $("#users-list-role").change(), $("#users-list-status").prop("selectedIndex", 0), $("#users-list-status").change(), $("#users-list-verified").prop("selectedIndex", 0), $("#users-list-verified").change(), $("#users-list-department").prop("selectedIndex", 0), $("#users-list-department").change()
        }), new agGrid.Grid(t, e)
    }
    $("#users-language-select2").length > 0 && $("#users-language-select2").select2({
        dropdownAutoWidth: !0,
        width: "100%"
    }), $("#users-music-select2").length > 0 && $("#users-music-select2").select2({
        dropdownAutoWidth: !0,
        width: "100%"
    }), $("#users-movies-select2").length > 0 && $("#users-movies-select2").select2({
        dropdownAutoWidth: !0,
        width: "100%"
    }), $(".birthdate-picker").length > 0 && $(".birthdate-picker").pickadate({format: "mmmm, d, yyyy"}), $(".users-edit").length > 0 && $("input,select,textarea").not("[type=submit]").jqBootstrapValidation()
});
