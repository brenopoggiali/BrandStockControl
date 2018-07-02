<?php require 'header.php'?>
 
<?php
 
include 'conexao.php';
 
$id_loja = $_GET["id"];
$nome_loja2 = $_POST["nomeloja"];

$sql2 = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";

$result = $con->query($sql2);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }
 
$sql = "UPDATE loja SET nome_loja='$nome_loja2' WHERE id_loja=$id_loja";

$result = $con->query($sql);

?>

<script>
document.title = 'Editar <?php echo $nome_loja; ?> - Nordstrom'; 
</script>

<div class="w3-container">
<h2>Editar <b><?php echo $nome_loja; ?></b></h2>

<?php
if ($con->query($sql) === TRUE) {
    echo "A loja foi editada com sucesso.";
    header('Location: lojas.php');
} else {
    echo "Erro ao editar loja: " . $con->error;
}
?>

</div> 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>