<?php require 'header.php'?>
 
<?php
 
include 'conexao.php';
 
$id_roupa = $_GET["id"];

$sql3 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";

$result = $con->query($sql3);
 while ($row = $result->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }

$sql = "DELETE FROM roupa WHERE id_roupa=$id_roupa";
$sql2 = "DELETE FROM roupa_roupa WHERE id_roupa=$id_roupa";
 
$result = $con->query($sql);
$result = $con->query($sql2);



?>

<script>
document.title = 'Exclusão de <?php echo $nome_roupa; ?> - Nordstrom'; 
</script>

<div class="w3-container">
<h2>Exclusão de <b><?php echo $nome_roupa; ?></b></h2>

<?php
if ($con->query($sql) === TRUE) {
    echo "A roupa foi excluída com sucesso.";
    header('Location: roupas.php');
} else {
    echo "Erro ao deletar roupa: " . $con->error;
}
?>

</div> 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>