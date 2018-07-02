<?php require 'header.php'?>
 
<script>
document.title = 'Mover Roupa de Loja'; 
</script>

<?php

include 'conexao.php';

$id_loja = $_GET["id_loja"];
$id_loja2 = $_POST["id_loja2"];
$id_roupa = $_GET["id_roupa"];
$quantidade_m = $_POST["quantidade"];

$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja2";
$sql1 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";


$sql2 = "SELECT quantidade, id_loja, id_roupa FROM roupa_loja WHERE id_roupa=$id_roupa AND id_loja=$id_loja";

$sql_loja = "SELECT quantidade FROM roupa_loja WHERE id_loja = $id_loja AND id_roupa= $id_roupa";
$sql_loja2 = "SELECT quantidade FROM roupa_loja WHERE id_loja = $id_loja2 AND id_roupa= $id_roupa";

$result_l = $con->query($sql_loja);


 while ($row = $result_l->fetch_assoc()){
 	$quantidade = $row["quantidade"] - $quantidade_m;
 }

if($quantidade >= 0){
	$erro = 0;
	if($quantidade == 0){
		$sql_quant = "DELETE FROM roupa_loja WHERE id_loja=$id_loja AND id_roupa=$id_roupa";
	} else{
		$sql_quant = "UPDATE roupa_loja SET quantidade='$quantidade' WHERE id_loja=$id_loja AND id_roupa=$id_roupa";
	}
	
	
	$result_l2 = $con->query($sql_loja2);
	if($result_l2->num_rows > 0){
		while ($row = $result_l2->fetch_assoc()){
		 	$quantidade2 = $row["quantidade"] + $quantidade_m;
	 	}
	 	$sql_quant2 = "UPDATE roupa_loja SET quantidade='$quantidade2' WHERE id_loja=$id_loja2 AND id_roupa=$id_roupa";
	} else{
		$sql_quant2 = "INSERT INTO roupa_loja (quantidade, id_roupa, id_loja) VALUES ('$quantidade_m', '$id_roupa', '$id_loja2')";
	}
	
	$result_q = $con->query($sql_quant);
	$result_q2 = $con->query($sql_quant2);
} else{
	$erro = 1;
}

$result3 = $con->query($sql1);
 while ($row = $result3->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }

$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }

?>

<script>
document.title = 'Mover <?php echo $nome_roupa; ?> para <?php echo $nome_loja?> - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
	 <h2>Mover <b><?php echo $nome_roupa; ?></b> para <b><?php echo $nome_loja; ?></b></h2>
	</div>
	<br>
	<div class="w3-container">
	<?php
		if ($erro == 0) {
			echo "A roupa foi movida com sucesso";
			header('Location: consulta_loja.php?id='.$id_loja2);
		}else{
			echo "Não existe quantidade suficiente no estoque dessa loja.";
		}
	?>
	<br>
	</div>
	<br>
</div> 
<?php require 'footer.php' ?>