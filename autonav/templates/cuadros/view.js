$(document).ready(function() {
    $(".item-listado").hover(function() {
        $(this).stop().animate({
            "opacity": 1
        });
    }, function() {
        $(this).stop().animate({
            "opacity": 0.7
        });
    });
});