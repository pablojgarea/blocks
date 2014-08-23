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

    var url = window.location.pathname;
    
    var padres= $('.tree a[href*="'+url+'"]').parentsUntil('.tree');
    var nodo= $('.tree a[href*="'+url+'"]').parent().parent().parent().parent('li.parent_li');
    var hijos = padres.find(' > ul > li');
   
           hijos.show('fast');
           nodo.show('fast'); 

           hijos.attr('title', 'Collapse').find(' >  i').addClass('fa-plus-circle').removeClass('fa-minus-circle');
           nodo.attr('title', 'Collapse').find(' > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');

  	});