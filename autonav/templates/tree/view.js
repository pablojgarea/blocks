  $(document).ready(function () {

       function desplegar(nodo){
          nodo.find('span').on('click', function (e) {
                  var children = $(this).parent().parent().parent('li.parent_li').find('> ul > li');
                  if (!children.length){
                  hijos=$(this).parent().parent().parent().find('ul.nivel2');
                  ajaxHijos($(this).parent().find('a').attr('path'),hijos);
                  }
                  if (children.is(":visible")) {
                  children.hide('fast');
                  $(this).attr('title', 'Expande este apartado').find(' > i').addClass('fa-plus-circle').removeClass('fa-minus-circle');
                  } else {
                  children.show('fast');
                  $(this).attr('title', 'Pecha este apartado').find(' > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
                  }
                  e.stopPropagation();
          });
      }

      function ajaxHijos(path, hijos) {

        $.ajax({
                url:   '/webc5/index.php/tools/hijos-arbol.php?path='+path,
                type:  'get',
                success:  function (response) {
                     hijos.html(response);
                     desplegar(hijos);
                  },
                error: function (e){
                  alert('Error:'+e.message)
                  }
                  
                });
      }
      


      $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Expande este apartado');

        $('.tree .nodo > span').on('click', function (e) {
          var children = $(this).parent().parent().parent('li.parent_li').find('> ul > li');
          if (!children.length){
            hijos=$(this).parent().parent().parent().find('ul.nivel2');
            ajaxHijos($(this).parent().find('a').attr('path'),hijos);
            
            
          }
          if (children.is(":visible")) {
              children.hide('fast');
              $(this).attr('title', 'Expande este apartado').find(' > i').addClass('fa-plus-circle').removeClass('fa-minus-circle');
          } else {
              children.show('fast');
              $(this).attr('title', 'Pecha este apartado').find(' > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
          }
          e.stopPropagation();
      });

      var nodo= $('.tree li.nav-selected');
      var padres= nodo.parentsUntil('.tree > .nivel1');
      var hijos = nodo.find('> ul > li');

      padres.attr('title', 'Pecha este apartado').find('> .carpeta > .nodo > span > i, > .nodo > span > i').addClass('fa-minus-circle').removeClass('fa-plus-circle').attr('title', 'Pecha este apartado');
      nodo.attr('title', 'Pecha este apartado').find('> .carpeta > .nodo > span > i, > .nodo > span > i').addClass('fa-minus-circle').removeClass('fa-plus-circle').attr('title', 'Pecha este apartado');
      hijos.attr('title', 'Pecha este apartado').find('> .carpeta > .nodo > span > i, > .nodo > span > i').attr('title', 'Expande este apartado');
      
      padres.show();
      nodo.show();
      hijos.show();
      
    });
