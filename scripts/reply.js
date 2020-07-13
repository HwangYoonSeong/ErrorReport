$(document).ready(function () {
    $(".writeReply a").siblings().hide()
    $(".writeReply a").click(function () {
        $(this).siblings().slideToggle(100);

    });
});


