    $(document).ready(function () {
        //we bind the effect of mouseover and mouseenter on the food-box wrapper.
        $(".flecha-pie").bind("mouseover, mouseenter", function () {
            
            
            //this will find the child food-box-transparentbg div and slide/show the hidden box 
            $(this).parent().find(".item-cuadro-capa-transparente").slideDown(300);
            $(this).hide();

            //we bind when the effect of mouseout and mouseleave on the food-box wrapper
        });
        $(".flecha-pie").bind("click", function () {
                    
            //this will find the child food-box-transparentbg div and slide/show the hidden box 
            $(this).parent().find(".item-cuadro-capa-transparente").slideDown(300);
            $(this).hide();

            //we bind when the effect of mouseout and mouseleave on the food-box wrapper
        });
        $(".item-listado-cuadros-capas").bind("mouseout, mouseleave", function () {
            //this will find the child food-box-transparentbg div and hide the hidden box 
            $(this).find(".item-cuadro-capa-transparente").slideUp(300);
            $(this).find(".flecha-pie").show();

        });

        $(".flecha-abajo").bind("click", function () {
            //this will find the child food-box-transparentbg div and hide the hidden box 
            $(this).parent().slideUp(300);
            $(this).parent().parent().find(".flecha-pie").show();

        });

        /*
        This is optional, if you want to enable url when user click the box, you can use this function. Otherwise you can leave it or remove it from the code.
        */
        $(".item-listado-cuadros-capas").bind("click", function () {
            window.location.href = "#";
        });
    });