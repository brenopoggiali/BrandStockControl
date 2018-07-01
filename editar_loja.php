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
document.title = 'Editar <?php echo $nome_loja; ?> - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Editar <b><?php echo $nome_loja; ?></b></h2>
	</div>
	<form method="POST" action="editar_loja_code.php?id=<?php echo $_GET["id"];?>" class="w3-container">
		<label>Nome </label> <input class="w3-input" type="text" name="nomeloja" value="<?php echo $nome_loja; ?>" required><br>
		<button class="w3-button w3-khaki w3-hover-light-grey" type="submit">Salvar</button>
	</form>
<br>
</div>

 
<?php 
 
$con->close(); 
 
?>

<?php require 'footer.php'?>