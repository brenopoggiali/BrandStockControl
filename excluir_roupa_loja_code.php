<?php require 'header.php'?>
 
<?php
 
include 'conexao.php';
 
$id_loja = $_GET["id_loja"];
$id_roupa = $_GET["id_roupa"];


$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";
$sql1 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";
$sql2 = "SELECT quantidade, id_loja, id_roupa FROM roupa_loja WHERE id_loja=$id_loja";


$result = $con->query($sql1);
 while ($row = $result->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }

$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }


$sql = "DELETE FROM roupa_loja WHERE id_loja=$id_loja and id_roupa=$id_roupa";
 

$result = $con->query($sql);
$result = $con->query($sql2);



?>
<script>
document.title = 'Exclusão de <?php echo $nome_roupa; ?> de <?php echo $nome_loja; ?>  - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Exclusão de <b><?php echo $nome_roupa; ?></b> de <b><?php echo $nome_loja; ?></b></h2>
	</div>
	<div class="w3-container">
		<?php
		if ($con->query($sql) === TRUE) {
		    echo "A roupa foi excluída da loja com sucesso.";
		    header('Location: consulta_loja.php?id='.$id_loja);
		} else {
		    echo "Erro ao deletar a roupa da loja: " . $con->error;
		}
		?>
		<br><br>
	</div>
</div>	



<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>