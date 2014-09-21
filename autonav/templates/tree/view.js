  $(document).ready(function () {
      $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Expande este apartado');
        $('.tree .nodo > span').on('click', function (e) {
          var children = $(this).parent().parent().parent('li.parent_li').find('> ul > li');
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
