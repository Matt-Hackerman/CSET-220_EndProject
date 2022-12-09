$(".symbol").each(function() {
    if ($("#yesNo").text() == 0) {
        $(this).text("Not Done");
        $(this).attr("id", "symbol");
    }
    else {
        $(this).text("Done");
        $(this).attr("id", "symbol");
    }
});

$(".check").each(function() {
    if ($("#check").text() == 0) {
        $(this).text("No");
        $(this).attr("id", "symbol");
    }
    else {
        $(this).text("Yes");
        $(this).attr("id", "symbol");
    }
});

$("#allDates").on("change", function() {
    $("#checkList").submit();
});

$("#updateCL").click(function() {
    $("#updateList").submit();
});

$("#logOutLink").click(function() {
    $("#logout").submit();
});