<?php require 'header.php'?>

<?php
 
include 'conexao.php';

$id_roupa = $_GET["id"];

$sql = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";

$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }
?>

<script>
document.title = 'Exclusão de <?php echo $nome_roupa; ?> - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Exclusão de <b><?php echo $nome_roupa; ?></b></h2>
	</div>
	<div class="w3-container">
		Tem certeza de que deseja excluir <b><?php echo $nome_roupa; ?></b> do seu estoque?
		<a href="excluir_roupa_code.php?id=
		<?php
		echo $_GET["id"];
		?>
		">
		<br>
		<button class="w3-button w3-khaki w3-hover-light-grey">Excluir</button></a>
		<a href="roupas.php"><button class="w3-button w3-khaki w3-hover-light-grey">Cancelar</button></a>
		<br><br>
	</div>
</div>	 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>