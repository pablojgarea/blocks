$(document).ready(function() {
    $('.item-listado').hover(function() {

    });

    $(".item-listado").hover(function() {
        $(this).stop().animate({
            "opacity": 1
        });
        $(this).children('.titulo').stop().animate({
            "opacity": 0
        });
        
        $(this).children('.descripcion').css('display', 'table-cell');
        $(this).children('.descripcion').removeClass('oculto');

        $(this).children('.descripcion').animate({
            top: '-=40px',
        },200);

        $(this).children('.titulo').animate({
            top: '-=40px',
        },200);

        setTimeout(function(){
            $(this).children('.titulo').toggle();
        }, 200);
        
    }, function() {
        $(this).stop().animate({
            "opacity": 0.5
        });
        $(this).children('.titulo').toggle();
        $(this).children('.descripcion').animate({
            top: '+=40px'
        },200);

        $(this).children('.titulo').animate({
            top: '+=40px'
        },200);

        setTimeout(function(){
            $(this).children('.descripcion').addClass('oculto');
        }, 200);
        $(this).children('.descripcion').toggle();

        
    });
});