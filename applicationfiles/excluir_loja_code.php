<?php require 'header.php'?>
 
<?php
 
include 'conexao.php';
 
$id_loja = $_GET["id"];

$sql3 = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";

$result = $con->query($sql3);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }

$sql = "DELETE FROM loja WHERE id_loja=$id_loja";
$sql2 = "DELETE FROM roupa_loja WHERE id_loja=$id_loja";
 
$result = $con->query($sql);
$result = $con->query($sql2);



?>

<script>
document.title = 'Exclusão de <?php echo $nome_loja; ?> -  Nordstrom'; 
</script>

<div class="w3-container">
<h2>Exclusão de <b><?php echo $nome_loja; ?></b></h2>

<?php
if ($con->query($sql) === TRUE) {
    echo "A loja foi excluída com sucesso.";
    header('Location: lojas.php');
} else {
    echo "Erro ao deletar loja: " . $con->error;
}
?>

</div> 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>