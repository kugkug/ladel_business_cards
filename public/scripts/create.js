$(document).ready(function () {
    $("[data-trigger=department]").on("click", function () {
        let Span = $(this).find("span")[0];
        let Icon = $(this).find("i")[0];

        if ($(Span).attr("data-type") == "add") {
            $(Span).attr("data-type", "cancel");
            $(Icon).removeClass("fa-plus").addClass("fa-trash");
            $(this).removeClass("btn-info").addClass("btn-danger");

            $("[name=department]").val("").show().focus();
            $("[name=select_department]").val("").hide();
        } else {
            $(Span).attr("data-type", "add");
            $(Icon).removeClass("fa-trash").addClass("fa-plus");
            $(this).removeClass("btn-danger").addClass("btn-info");

            $("[name=department]").val("").hide();
            $("[name=select_department]").val("").show();
        }
    });

    $("[name=select_department]").on("change", function () {
        $("[name=department]").val($(this).val());
    });
});
