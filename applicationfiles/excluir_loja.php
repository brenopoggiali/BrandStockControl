<?php require 'header.php'?>
 
 
<?php
 
include 'conexao.php';

$id_loja = $_GET["id"];

$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";

$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }
?>

<script>
document.title = 'Exclusão de <?php echo $nome_loja; ?> -  Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Exclusão de <b><?php echo $nome_loja; ?></b></h2>
	</div>
	<div class="w3-container">
		Tem certeza de que deseja excluir <b><?php echo $nome_loja; ?></b> e todo o seu estoque?
		<a href="excluir_loja_code.php?id=
		<?php
		echo $_GET["id"];
		?>
		">
		<br>
		<button class="w3-button w3-khaki w3-hover-light-grey">Excluir</button></a>
		<a href="lojas.php"><button class="w3-button w3-khaki w3-hover-light-grey">Cancelar</button></a>
		<br><br>
	</div>
</div>	 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>