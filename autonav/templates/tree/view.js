  $(document).ready(function () {
      $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree .nodo > span').on('click', function (e) {
          var children = $(this).parent().parent().parent('li.parent_li').find('> ul > li');
          if (children.is(":visible")) {
              children.hide('fast');
              $(this).attr('title', 'Expand this branch').find(' > i').addClass('fa-plus-circle').removeClass('fa-minus-circle');
          } else {
              children.show('fast');
              $(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
          }
          e.stopPropagation();
      });

      var nodo= $('.tree li.nav-selected');
      var padres= nodo.parentsUntil('.tree > .nivel1');
      var hijos = nodo.find('> ul > li');

      padres.attr('title', 'Collapse this branch').find('> .carpeta > .nodo > span > i, > .nodo > span > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
      nodo.attr('title', 'Collapse this branch').find('> .carpeta > .nodo > span > i, > .nodo > span > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
      padres.show();
      nodo.show();
      hijos.show();
      
    });
