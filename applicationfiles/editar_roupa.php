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
document.title = 'Editar <?php echo $nome_roupa; ?> - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Editar <b><?php echo $nome_roupa; ?></b></h2>
	</div>
	<form method="POST" action="editar_roupa_code.php?id=<?php echo $_GET["id"];?>" class="w3-container">
		<label>Nome </label> <input class="w3-input" type="text" name="nomeroupa" value="<?php echo $nome_roupa; ?>" required><br>
		<button class="w3-button w3-khaki w3-hover-light-grey" type="submit">Salvar</button>
	</form>
<br>
</div>

 
<?php 
 
$con->close(); 
 
?>

<?php require 'footer.php'?>
