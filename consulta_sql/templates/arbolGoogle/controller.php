<?php  defined('C5_EXECUTE') or die("Access Denied.");

class ConsultaSqlBlockController extends BlockController {
	
	protected $btName = 'Consulta SQL';
	protected $btDescription = '';
	protected $btTable = 'btDCConsultaSql';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;

	protected $conexionDirectorio;

	function conectarDB(){
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "directorio";

		if(!isset($conexionDirectorio)){
		// Create connection
			$conexionDirectorio = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conexionDirectorio->connect_error) {
			    die("Connection failed: " . $conexionDirectorio->connect_error);
			} 
		}
	}

	public function raiz($id){
		conectarDB();
		$sql="select id_elemento, id_padre, te_nombre_g, te_nombre, co_visible_org
			from elemento
			where id_jrrqa = 1
			  and co_visible = 'S'
			  and te_tipo = 'D'
			  and id_elemento = ".$id;

		$result = mysql_query($sql);
		return $result;
	}


	public function descendientes($id_padre){
		conectarDB();
		$sql = "select descendiente.id_elemento, descendiente.id_padre, descendiente.te_nombre, descendiente.te_nombre_g, descendiente.te_path
			from elemento, elemento descendiente
			where elemento.id_elemento = ".$id_padre."
			  and descendiente.te_path regexp CONCAT(elemento.te_path, ',', elemento.id_elemento, '(\$|,.*)')
			  and descendiente.co_visible='S'
			  and descendiente.te_tipo in ('D')
			  and elemento.id_jrrqa = 1
			order by elemento.te_path";

		$result = mysql_query($sql);	
		return $result;
	}
}
