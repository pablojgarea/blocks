var aho, ho, min, seg, auxSeg, auxMin, auxHor, segCad, minCad, horCad;
var fecha, hora;

$(document).ready(function() {

    fecha = $(".date");
    hora = $(".hour");

    aho = $("#hora").text();
    if (aho != '') {
        var arho = aho.split(':');
        ho = arho[0];
        min = arho[1];
        seg = arho[2];
        auxSeg = '0';
        auxMin = '0';
        auxHor = '0';
        segCad = '' + seg;
        minCad = '' + min;
        horCad = '' + ho;
    }

    mostrarReloj();

    //si existe js eliminamos el enlace actualizar hora
    $(".actHora, #actHoraInt").remove();

    //funcionalidad mapa
    if ($('#mapa').length > 0) {
        $('#gotoSede').css("display", "none");

        $('#mapa').maphilight({
            fillColor: '888888',
            fillOpacity: 1,
            fade: true,
            stroke: true,
            strokeColor: '51514F',
            strokeOpacity: 1,
            strokeWidth: 3,
            shadow: true,
            shadowX: 0,
            shadowY: 0,
            shadowRadius: 6,
            shadowPosition: 'outside',
            shadowFrom: 'fill',
            shadowColor: '555555',
            shadowOpacity: 1
        });

        $('map area').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            highLightArea(this);
            var id = $(this).attr('id');
            updateConcelloInfoBox(id, function(id) {
                $("#" + id + "_option").attr("selected", "selected");
                if (!$('#seleccion').val() || $('#seleccion').val() == '') $("#gotoSede").css("display", "none")
                else $("#gotoSede").css("display", "inline");
            });
        });

        $('map area').hover(function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            updateConcelloTempInfoBox(id);
        }, function(e) {
            e.preventDefault();
            clearConcelloTempInfoBox();
        });



        $('#seleccion').change(function(e) {
            e.preventDefault();
            e.stopPropagation();

            if (!$(this).val() || $(this).val() == '' || $(this).val() == '0') {
                $("#gotoSede").css("display", "none")
                if ($(this).val() == '0') {
                    $.each($('map area'), function(i, v) {
                        var data = $(this).data('maphilight') || {};
                        data.alwaysOn = false;
                        $(this).data('maphilight', data).trigger('alwaysOn.maphilight');
                    });
                }
            } else $("#gotoSede").css("display", "inline");

            var id = $("option:selected", this).attr("id");

            if (!id || id == '') {
                $(".box3").css("display", "none")
            } else {
                id = id.replace("_option", "");
                updateConcelloInfoBox(id, function(id) {
                    highLightArea($("#" + id));
                });
            }

        });

        $("#gotoSede").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            window.open($('#seleccion').val(), 'subsede')
        });
    }

    $("#close_warning").click(function() {
        $(this).parents(".warning").fadeOut('medium', function() {
            $(this).remove();
        });
    });

    $(".prim a").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.print();
        return false;
    });

});

function highLightArea(area) {
    var data = $(area).data('maphilight') || {};
    data.alwaysOn = !data.alwaysOn;
    $(area).data('maphilight', data).trigger('alwaysOn.maphilight');
    $.each($(area).siblings('area'), function(i, v) {
        var data = $(this).data('maphilight') || {};
        data.alwaysOn = false;
        $(this).data('maphilight', data).trigger('alwaysOn.maphilight');
    });
}

function clearConcelloInfoBox() {
    $(".box3").css("display", "none");
}

function clearConcelloTempInfoBox() {
    $("#super").css("display", "none").html("");
    if (!$(".box3").hasClass("fijo")) $(".box3").css("display", "none");
}

function updateConcelloInfoBox(identificador, f) {
    $("#" + identificador + "_info").addClass("visible").siblings("li").removeClass("visible").parents(".box3").css("display", "block").addClass("fijo");

    if ($.isFunction(f)) {
        f.call(this, identificador);
    }
}

function updateConcelloTempInfoBox(identificador, f) {
    $("#" + identificador + "_info").clone().appendTo("#super").wrap("<ul/>").css("display", "block").parents(".box3_mid").css("display", "block");
    if ($("#super:visible").length == 0 && !$(".box3").hasClass("fijo")) $(".box3").css("display", "block");
    if ($.isFunction(f)) {
        f.call(this, identificador);
    }
}

function updateFecha(DateString) {
    fecha.html(DateString);
}

function mostrarReloj() {
    if (aho != '') {
        seg++;
        if (seg == 60) {
            seg = 0;
            min++;
            if (min == 60) {
                min = 0;
                ho++;
                if (ho == 24) {
                    ho = 0;
                    var newDate = $.datepicker.parseDate("DD d 'de' MM yy", document.getElementById("fecha").innerHTML, {
                        'dayNames': dayNames,
                        'monthNames': monthNames
                    });
                    var nextDay = new Date(newDate.setDate(newDate.getDate() + 1));
                    updateFecha($.datepicker.formatDate("DD d 'de' MM yy", nextDay, {
                        'dayNames': dayNames,
                        'monthNames': monthNames
                    }));
                }
            }
        }
        var segCad = '' + seg,
            minCad = '' + min,
            horCad = '' + ho;
        if (segCad.length != 1) {
            auxSeg = '';
        } else {
            auxSeg = '0';
        }
        if (minCad.length != 1) {
            auxMin = '';
        } else {
            auxMin = '0';
        }
        if (horCad.length != 1) {
            auxHor = '';
        } else {
            auxHor = '0';
        }
    }
    if (aho != '') {
        hora.html("" + auxHor + ho + ":" + auxMin + min + ":" + auxSeg + seg);
        window.setTimeout("mostrarReloj()", 1000);
    }
}