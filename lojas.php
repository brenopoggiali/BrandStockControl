<?php require 'header.php'?>
<script>
document.title = 'Lojas - Nordstrom'; 
</script>
<?php
 
include 'conexao.php';
 
$sql = "SELECT id_loja, nome_loja FROM loja ORDER BY nome_loja";
 
$result = $con->query($sql);
 
?>
<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Lojas</h2>
	</div>
	<div class="w3-container">
		<br>
		<a href="cadastro_loja.php"><button class="w3-button w3-khaki w3-hover-light-grey">Adicionar Nova Loja</button></a>
		<br><br>
		<input class="w3-input w3-border w3-padding" type="text" placeholder="Pesquise por lojas..." id="myInput" onkeyup="myFunction()">
		<br>
		  <?php
		if ($result->num_rows > 0) {
		echo "
		<table class='w3-table-all' id='myTable'>
		<thead>
		<tr class='w3-light-grey'>
		<th>Nome</th>
		<th>Ações</th>
		</thead>
		"; 
		    while($row = $result->fetch_assoc()) {
		        echo "<tr>
		        <td>" . $row["nome_loja"]. "</td>
		        <td><a href='consulta_loja.php?id=" .$row["id_loja"]. "'><button class='w3-button w3-khaki w3-hover-light-grey'>Ver roupas</button></a>  
		        <a href='editar_loja.php?id=".$row["id_loja"]."'><button class='w3-button w3-khaki w3-hover-light-grey'>Editar</button></a>
		        <a href='excluir_loja.php?id=" .$row["id_loja"]. "'><button class='w3-button w3-khaki w3-hover-light-grey'>Excluir</button></a></td></tr>";
		    }
		} else {
		    echo "Não existem lojas cadastradas.";
		}
		?>

		</table>
	</div>
	<br>
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