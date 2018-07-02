<?php require 'header.php'?>

<?php
 
include 'conexao.php';

$id_loja = $_GET["id_loja"];
$id_roupa = $_GET["id_roupa"];

$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";
$sql1 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";
$sql2 = "SELECT quantidade, id_loja, id_roupa FROM roupa_loja WHERE id_roupa=$id_roupa and id_loja=$id_loja";


$result = $con->query($sql2);
 while ($row = $result->fetch_assoc()){
 	$quantidade = $row["quantidade"];
 }

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
document.title = 'Editar quantidade de <?php echo $nome_roupa; ?> de <?php echo $nome_loja ?> - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Editar quantidade de <b><?php echo $nome_roupa; ?></b> de <b><?php echo $nome_loja?></b></h2>
	</div>
	<form method="POST" action="editar_roupa_loja_code.php?id_roupa=<?php echo $_GET["id_roupa"];?>&id_loja=<?php echo $_GET["id_loja"]?>" class="w3-container">
		<label>Quantidade </label> <input class="w3-input" type="text" name="quantidade-roupa" value="<?php echo $quantidade; ?>" required><br>
		<button class="w3-button w3-khaki w3-hover-light-grey" type="submit">Salvar</button>
	</form>
<br>
</div>

 
<?php 
 
$con->close(); 
 
?>

<?php require 'footer.php'?>