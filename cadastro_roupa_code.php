<?php require 'header.php' ?>

 <script>
document.title = 'Cadastrar roupa - Nordstrom'; 
</script>

<?php 

include 'conexao.php';

$nome = $_POST['cadastrarroupa'];

$sql = "INSERT INTO roupa (nome_roupa) VALUES ('$nome')";

if ($con->query($sql) === TRUE) {
    echo "Roupa cadastrada com sucesso.";
    header('Location: roupas.php');
} else {
    echo "Erro: " . $sql . "<br>" . $con->error;
}

$con->close();

?>

<?php require 'footer.php' ?>