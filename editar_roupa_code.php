<?php require 'header.php'?>
 
<?php
 
include 'conexao.php';
 
$id_roupa = $_GET["id"];
$nome_roupa2 = $_POST["nomeroupa"];

$sql2 = "SELECT id_roupa, nome_roupa FROM roupa WHERE id_roupa=$id_roupa";

$result = $con->query($sql2);
 while ($row = $result->fetch_assoc()){
 	$nome_roupa = $row["nome_roupa"];
 }
 
$sql = "UPDATE roupa SET nome_roupa='$nome_roupa2' WHERE id_roupa=$id_roupa";

$result = $con->query($sql);

?>

<script>
document.title = 'Editar <?php echo $nome_roupa; ?> - Nordstrom'; 
</script>

<div class="w3-container">
<h2>Editar <b><?php echo $nome_roupa; ?></b></h2>

<?php
if ($con->query($sql) === TRUE) {
    echo "A roupa foi editada com sucesso.";
    header('Location: roupas.php');
} else {
    echo "Erro ao editar a roupa: " . $con->error;
}
?>

</div> 


<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>