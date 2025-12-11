$(document).ready(function () {
    $("[data-trigger=delete]").on("click", function (e) {
        e.preventDefault();

        if (confirm("Are you sure you want to delete this record?") === true)
            $(this).closest("form").submit();
    });
});
