<?php require 'header.php'?>
 
<script>
document.title = 'Remover roupa'; 
</script>

<?php
 
include 'conexao.php';

$id_loja = $_GET["id_loja"];
$id_roupa = $_GET["id_roupa"];

$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";
$sql1 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";
$sql2 = "SELECT quantidade, id_loja, id_roupa FROM roupa_loja WHERE id_roupa=$id_roupa and id_loja=$id_loja";


$result = $con->query($sql1);
 while ($row = $result->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }

$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }
?>

<script>
document.title = 'Exclusão de <?php echo $nome_roupa; ?> de <?php echo $nome_loja; ?>  - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Exclusão de <b><?php echo $nome_roupa; ?></b> de <b><?php echo $nome_loja; ?></b></h2>
	</div>
	<div class="w3-container">
		Tem certeza que deseja remover <b><?php echo $nome_roupa; ?></b> e todo o seu estoque da <b><?php echo $nome_loja ?></b>?
		<a href="excluir_roupa_loja_code.php?id_roupa=<?php
		echo $_GET["id_roupa"];
		?>&id_loja=<?php echo $_GET["id_loja"] ?>
		">
		<br>
		<button class="w3-button w3-khaki w3-hover-light-grey">Remover</button></a>
		<a href="consulta_loja.php?id=<?php echo $_GET["id_loja"]?>"><button class="w3-button w3-khaki w3-hover-light-grey">Cancelar</button></a>
		<br><br>
	</div>
</div>	 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>