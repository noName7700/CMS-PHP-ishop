$(".delete").click(function() {
    let res = confirm("Подтвердите действие");
    if (!res) return false;
});

$(".nav-sidebar a").each(function() {
    let location = window.location.protocol + "//" + window.location.host + window.location.pathname;
    let link = this.href;
    if (link == location) {
        $(this).addClass("active");
        $(this).parent().addClass("active menu-open menu-is-opening");
    }
})

$("#reset-filter").on("click", function() {
    $("#filter input[type=radio]").prop("checked", false);
    return false;
});

$(".select2").select2({
    placeholder: "Начните вводить наименование товара",
    minimumInputLength: 2,
    cache: true,
    ajax: {
        url: adminpath + "/product/related-product",
        delay: 250,
        dataType: "json",
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function(data, params) {
            return {
                results: data.items,
            };
        },
    },
});

$("#add").on("submit", function() {
    if (!isNumeric( $("#category_id").val() )) {
        alert("Выберите категорию");
        return false;
    }
});

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}