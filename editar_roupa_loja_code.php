<?php require 'header.php'?>
 
<?php
 
include 'conexao.php';
 
$id_loja = $_GET["id_loja"];
$id_roupa = $_GET["id_roupa"];
$quantidade1 = $_POST["quantidade-roupa"];

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
 


$result = $con->query($sql);

?>
<div class="w3-container">
<h2>Editar quantidade de <b><?php echo $nome_roupa; ?></b> de <b><?php echo $nome_loja ?></b></h2>

<script>
document.title = 'Editar quantidade de <b><?php echo $nome_roupa; ?></b> de <b><?php echo $nome_loja ?> - Nordstrom'; 
</script>

<?php
if ($quantidade1 <= 0) {
	echo "Digite uma quantidade maior do que zero. <a href='editar_roupa_loja.php?id_roupa=".$id_roupa."&id_loja=".$id_loja."'><br><br><button class='w3-button w3-khaki w3-hover-light-grey'>Voltar</button></a>";
} else {

	$sql = "UPDATE roupa_loja SET quantidade='$quantidade1' WHERE id_loja=$id_loja and id_roupa=$id_roupa";

	if ($con->query($sql) === TRUE) {
    	echo "A quantidade dessa roupa foi editada com sucesso.";
    	header('Location: consulta_loja.php?id='.$id_loja);
	} else {
    	echo "Erro ao editar quantidade: " . $con->error;
	}
}
?>

</div> 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>