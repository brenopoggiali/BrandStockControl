<?php require 'header.php'?>

<script>
document.title = 'Cadastrar loja - Nordstrom'; 
</script>

<?php 

include 'conexao.php';

$nome = $_POST['cadastrarloja'];

$sql = "INSERT INTO loja (nome_loja) VALUES ('$nome')";

if ($con->query($sql) === TRUE) {
    echo "Loja cadastrada com sucesso.";
    header('Location: lojas.php');
} else {
    echo "Erro: " . $sql . "<br>" . $con->error;
}

$con->close();



?>

<?php require 'footer.php'?>