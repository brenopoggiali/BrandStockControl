<?php require 'header.php'?>
 
<script>
document.title = 'Adicionar roupa - Nordstrom'; 
</script>

<?php

include 'conexao.php';

$id_loja = $_GET["id"];
 
$sql2 = "SELECT nome_loja FROM loja WHERE id_loja = $id_loja";

 

$result2 = $con->query($sql2);

while ($row = $result2->fetch_assoc()){
 	$nome_loja = $row["nome_loja"];
 }

$sql = "SELECT id_roupa, nome_roupa FROM roupa";
 
$result = $con->query($sql);
 
?>
<div class="w3-card">
	<div class="w3-container w3-light-grey">
		<h2>Adicionar roupa a <b><?php echo $nome_loja; ?></b></h2>
	</div>
	<div class="w3-container">
		<br>
		<input class="w3-input w3-border w3-padding" type="text" placeholder="Pesquise por roupas..." id="myInput" onkeyup="myFunction()"><br>
		  <?php
		if ($result->num_rows > 0) {
		echo "
		<table class='w3-table-all' id='myTable'>
		<thead>
		<tr class='w3-light-grey'>
		<th>Nome</th>
		<th>Quantidade</th>
		<th>Ações</th>
		</thead>
		"; 
		    while($row = $result->fetch_assoc()) {
		    	$roupa_id = $row['id_roupa'];
		    	$sql3 = "SELECT id_roupa, id_loja FROM roupa_loja WHERE id_roupa=$roupa_id AND id_loja=$id_loja";
		    	$result3 = $con->query($sql3);
		        if ($result3->num_rows > 0) {
		        }else{
		        	echo "<tr>
			        <td>" . $row["nome_roupa"]. "</td>
			        <td> <form method='POST' action='adicionar_roupa_loja_code.php?id_roupa=".$row["id_roupa"]."&id_loja=" .$id_loja."'>
			        <input type='text' name='quantidade' class='w3-border w3-padding' required>
			        </td>
			        <td><button type='submit' class='w3-button w3-khaki w3-hover-light-grey'>Adicionar</button></form></td></tr>";
		        }
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