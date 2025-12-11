$(document).ready(function () {
    $("[name=search_by]").on("change", function () {
        $("[name=table_search]").val("");
        $("[name=brand_name]").val("");

        if ($(this).val() == "sku") $("[name=brand_name]").hide();
        else $("[name=brand_name]").show();
    });

    $("[name=brand_name]").on("change", function () {
        let Form = $(this).closest("form");
        $(Form).submit();
    });
});
