<?php require 'header.php'?>
 

<?php
 
include 'conexao.php';
 
$id_loja = $_GET["id"];

$sql2 = "SELECT roupa_loja.quantidade, roupa_loja.id_loja, roupa_loja.id_roupa, roupa.nome_roupa
FROM roupa_loja
RIGHT JOIN roupa
ON roupa_loja.id_roupa = roupa.id_roupa WHERE roupa_loja.id_loja=$id_loja
ORDER BY roupa.nome_roupa;";
$result2 = $con->query($sql2);

$sql = "SELECT id_loja, nome_loja FROM loja WHERE id_loja=$id_loja";

$result = $con->query($sql);
 while ($row = $result->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }
 
?>

 <script>
document.title = '<?php echo $nome_loja; ?> - Nordstrom'; 
</script>


<div class="w3-container">
<h2>Roupas - <b><?php echo $nome_loja; ?></b></h2>

<a href="adicionar_roupa_loja.php?id=<?php echo $id_loja; ?>"><button class="w3-button w3-khaki w3-hover-light-grey">Adicionar Nova Roupa</button></a>
<br><br>
<input class="w3-input w3-border w3-padding" type="text" placeholder="Pesquise por roupas..." id="myInput" onkeyup="myFunction()"><br>
  <?php
if ($result2->num_rows > 0) {
echo "
<table class='w3-table-all' id='myTable'>
<thead>
<tr class='w3-light-grey'>
<th>Nome</th>
<th>Quantidade</th>
<th>Ações</th>
</thead>
"; 
    while($row = $result2->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["nome_roupa"]. "</td>
        <td>" . $row["quantidade"]. "</td>
        <td><a href='editar_roupa_loja.php?id_roupa=" .$row["id_roupa"]. "&id_loja=".$row["id_loja"]."'><button class='w3-button w3-khaki w3-hover-light-grey'>Editar quantidade</button></a>
        <a href='mover_roupa_loja.php?id_roupa=" .$row["id_roupa"]. "&id_loja=".$row["id_loja"]."'><button class='w3-button w3-khaki w3-hover-light-grey'>Mover</button></a> 
        <a href='excluir_roupa_loja.php?id_roupa=" .$row["id_roupa"]. "&id_loja=".$row["id_loja"]."'><button class='w3-button w3-khaki w3-hover-light-grey'>Remover</button></a></td></tr>";
    }
} else {
    echo "Não existem roupas nessa loja.";
}
?>

</table>
</div> 

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<?php require 'footer.php'?>
 
<?php 
 
$con->close(); 
 
?>