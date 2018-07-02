<?php require 'header.php'?>

<script>
document.title = 'Adicionar roupa - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Aviso</h2>
	</div>
	<div class="w3-container">
		<br>
<?php 

include 'conexao.php';

$id_roupa = $_GET['id_roupa'];
$id_loja = $_GET['id_loja'];
$quantidade = $_POST['quantidade'];

if ($quantidade <= 0) {
	echo "Digite uma quantidade maior do que zero. <a href='adicionar_roupa_loja.php?id=".$id_loja."'><br><br><button class='w3-button w3-khaki w3-hover-light-grey'>Voltar</button></a>";
} else{ 

	$sql = "INSERT INTO roupa_loja (id_loja, id_roupa, quantidade) VALUES ('$id_loja', '$id_roupa', '$quantidade')";

	if ($con->query($sql) === TRUE) {
	    echo "Roupa adicionada com sucesso.";
	    header('Location: consulta_loja.php?id='.$id_loja);
	} else {
	    echo "Erro: " . $sql . "<br>" . $con->error;
	}

}
?>
</div>
<br>
</div>

<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>