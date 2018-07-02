<?php require 'header.php'?>
 

<?php

include 'conexao.php';

$id_loja = $_GET["id_loja"];
$id_roupa = $_GET["id_roupa"];


$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";
$sql1 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";
$sql2 = "SELECT quantidade, id_loja, id_roupa FROM roupa_loja WHERE id_roupa=$id_roupa and id_loja=$id_loja";
$sql4 = "SELECT id_loja, nome_loja FROM loja ORDER BY nome_loja";

$result2 = $con->query($sql2);
 while ($row = $result2->fetch_assoc()){
 	$quantidade = $row["quantidade"];
 }

$result3 = $con->query($sql1);
 while ($row = $result3->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }


$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }

$result4 = $con->query($sql4);

?>

 <script>
document.title = 'Mover <?php echo $nome_roupa; ?> de <?php echo $nome_loja?> - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
	 <h2>Mover <b><?php echo $nome_roupa; ?></b> de <b><?php echo $nome_loja?></b></h2>
	</div>

	<form method="POST" action="mover_roupa_loja_code.php?id_roupa=<?php echo $id_roupa; ?>&id_loja=<?php echo $id_loja; ?>" class="w3-container">
		<label>Quantidade</label> <input class="w3-input" type="text" value="<?php echo $quantidade; ?>" name="quantidade" required><br>
		<select name="id_loja2">
		<?php
		if ($result4->num_rows > 0) {
			while($row = $result4->fetch_assoc()) {
		        if($row['id_loja']!=$id_loja){
		        echo "<option value='".$row['id_loja']."'>".$row['nome_loja']."</option>";
		    	}
		    }
		}else {
		    echo "<option disabled> Não existem lojas cadastradas. </option>";
		}
		?>
		</select>
		<br><br>
		<button type="submit" class="w3-button w3-khaki w3-hover-light-grey">Mover</button>
	</form>
	<br>
</div> 
<?php require 'footer.php' ?>