<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_textbox_text)): ?>

<?php
$db = Loader::db();
$sql='select distinct questionSetId from btForm where surveyName=?';
$rows = $db->getRow($sql,$field_1_textbox_text);
$id = $rows['questionSetId'];
$answerSets = $db->getAll('select asID from btFormAnswerSet where questionSetId=?',array($id));
echo "<table class='consulta_sql'>";
echo "<thead><tr>";

$v=$answerSets[1];
$asID = $v['asID'];
$numero_preguntas=$db->getRow('select count(*) as n_preguntas from btFormAnswers where asID=?',array($asID));
$sql='SELECT Q.question as question FROM btFormAnswers A, btFormQuestions Q WHERE A.asID = ? and A.msqID = Q.msqID LIMIT '.$numero_preguntas['n_preguntas'];
$questions = $db->execute($sql, array($asID));
$i=0;
foreach ($questions as $q){
        echo "<th>".$q['question']."</th>";
}


echo "</tr></thead>";


foreach ($answerSets as $v) {
        $asID = $v['asID'];
        $answers = $db->getAll('SELECT * FROM btFormAnswers A, btFormQuestions Q WHERE A.asID =? and A.msqID = Q.msqID', array($asID));
        echo "<tr>";
        foreach ($answers as $a){
                echo '<td>'.$a['answer'], $a['answerLong']. '</td>';
        }
        echo '</tr>';
}

echo "</table>";
?>


"language": {
    "search": "Filter records:"
  }

<script type="text/javascript">
$(document).ready(function(){
    $('.consulta_sql').DataTable({
  "language": {
  	"lengthMenu":     "Mostrar _MENU_ filas",
    "search": "Filtrar resgistros:",
    "emptyTable":     "No hay datos",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty":      "Mostrando 0 A 0 de 0 entradas",
    "infoFiltered":   "(filtrados de _MAX_ entradas totales)",
    "infoPostFix":    "",
    "thousands":      ",",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron registros",
    "paginate": {
        "first":      "Primero",
        "last":       "Último",
        "next":       "Siguiente",
        "previous":   "Previos"
    },
    "aria": {
        "sortAscending":  ": activar para ordenar ascendentemente",
        "sortDescending": ": activar para ordenar descendentemente"
    }
  }
});
});
</script>


<?php  endif; ?>


