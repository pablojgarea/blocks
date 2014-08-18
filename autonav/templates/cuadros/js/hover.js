$(function() {
    /*
    $('.panel').on('mouseenter.collapse.data-api', '[data-toggle=collapse]', function(e) {
        var $this = $(this),
            href, target = $this.attr('data-target') || e.preventDefault() || (href = $this.attr('href')) && href.replace(/.*(?=#[^s]+$)/, ''),
            option = $(target).data('collapse') ? 'show' : $this.data()
        $(target).collapse(option);
    });*/
    $("#accordion").hover(
        function() {
            $(this).addClass('menu_visible');
            $(this).removeClass('menu_oculto')
        }, function() {
            $(this).addClass('menu_oculto')
            $(this).removeClass('menu_visible');
        }
    );


    $(".hoverExpand").hover(
        function() {
            if (!$(this).hasClass('collapsing') &&
                $(this).hasClass('collapsed')) {
                $(this).click();
            }
        }, function() {
            if (!$(this).hasClass('collapsing') ||
                !$(this).hasClass('collapsed')) {
                $(this).click();
            }
        }
    );
});