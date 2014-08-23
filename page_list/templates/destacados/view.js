$(document).ready(function() {

    
    $(".contenido-item").hover(function() {
        var fadeinBox = $(this).children('.descripcion');
        var fadeoutBox = $(this).children('.titulo');

        fadeoutBox.stop(false, true).fadeOut(300,function(){fadeinBox.stop(false, true).fadeIn(400);this.style.removeAttribute('filter'); 
            });
    


    }, function() {
       var fadeinBox = $(this).children('.titulo');
        var fadeoutBox = $(this).children('.descripcion');

        fadeoutBox.stop(false, true).fadeOut(300,function(){fadeinBox.stop(false, true).fadeIn(400);this.style.removeAttribute('filter'); 
            });

        
    });

    var m = /(MSIE) ([\w.]+)/.exec( navigator.userAgent );
var patch = m && m[1] && m[2] < 9;

if (patch) {
    $.fn.fadeIn = function(speed, callback) {
        return this.animate({opacity: 'show'}, speed, function() {
            this.style.removeAttribute('filter'); 
            callback && callback(); 
        });
    };

    $.fn.fadeOut = function(speed, callback) {
        return this.animate({opacity: 'hide'}, speed, function() {
            this.style.removeAttribute('filter'); 
            callback && callback(); 
        });
    };

    $.fn.fadeTo = function(speed,to,callback) {
        return this.animate({opacity: to}, speed, function() {
            to == 1 && this.style.removeAttribute('filter'); 
            callback && callback(); 
        });
    };
}


});