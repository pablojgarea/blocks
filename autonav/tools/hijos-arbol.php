<?php defined('C5_EXECUTE') or die("Access Denied.");

$path = $_REQUEST['path'];

$raiz = Page::getByPath($path);
$idschildren = $raiz->getCollectionChildrenArray(1);

$listado="";
foreach($idschildren as $idchild){
	 $hijo=Page::getByID($idchild);
	 $excluir=$hijo->getAttribute('exclude_nav');
	 if ($excluir){
	 	continue;
	 }
	 $permisos=new Permissions($hijo);
	 if (!$permisos->canRead()){
	 	continue;
	 }

	 $isFather=$hijo->getCollectionChildrenArray(1);
	 $icono_carpeta='';
	 $li_class='';
	 if ($isFather){
	 	$icono_carpeta='<span><i class="fa fa-plus-circle"></i> </span>';
	 	$li_class="parent_li";
	 	$divs_apertura="<div class='carpeta'><div class='nodo'>";
	 	$divs_fin="</div></div>";
	 }else{
	 	$divs_apertura="<div class='nodo'>";
	 	$divs_fin="</div>";	 	
	 }
     $listado=$listado."<li class='".$li_class."'>".$divs_apertura.$icono_carpeta."<a path='".$hijo->getCollectionPath()."' href='/webc5".$hijo->getCollectionPath()."'>".$hijo->getCollectionName()."</a>".$divs_fin."<ul class='nivel2'></ul></li>";
}
print $listado;

?>