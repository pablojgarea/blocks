$(document).ready(function() {
    $('.item-listado').hover(function() {

    });

    $(".item-listado").hover(function() {
        $(this).stop().animate({
            "opacity": 1
        });
        $(this).children('.titulo').toggle();
        $(this).children('.descripcion').delay(400).css('display', 'table-cell');
    }, function() {
        $(this).stop().animate({
            "opacity": 0.7
        });
        $(this).children('.titulo').toggle();
        $(this).children('.descripcion').toggle();
    });
});