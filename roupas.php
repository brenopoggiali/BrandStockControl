<?php require 'header.php'?>

<script>
document.title = 'Roupas - Nordstrom'; 
</script>
 
<?php
 
include 'conexao.php';
 
$sql = "SELECT id_roupa, nome_roupa FROM roupa ORDER BY nome_roupa";
 
$result = $con->query($sql);
 
?>
<div class="w3-card">

  <div class="w3-container w3-light-grey">
    <h2>Roupas</h2>
  </div>
  <div class='w3-container'>
  <br>
    <a href="cadastro_roupa.php"><button class="w3-button w3-khaki w3-hover-light-grey">Adicionar Nova Roupa</button><a>
  <br><br>
    <input class="w3-input w3-border w3-padding" type="text" placeholder="Pesquise por roupas..." id="myInput" onkeyup="myFunction()"><br>
    <?php
    if ($result->num_rows > 0) {
    echo "
    <table class='w3-table-all' id='myTable'>
    <thead>
    <tr class='w3-light-grey'>
    <th>Nome</th>
    <th>Ações</th>
    <th>Encontra-se em</th>
    </thead>
    "; 
      while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["nome_roupa"]. "</td>";
        echo "<td>
        <a href='editar_roupa.php?id=" .$row["id_roupa"]. "'><button class='w3-button w3-khaki w3-hover-light-grey'>Editar</button></a>
        <a href='excluir_roupa.php?id=" .$row["id_roupa"]. "'><button class='w3-button w3-khaki w3-hover-light-grey'>Excluir</button></a></td>";
?>
       <td>
          <button onclick="document.getElementById('id<?php echo $row["id_roupa"]; ?>').style.display='block'"class='w3-button w3-khaki w3-hover-light-grey'>Ver lojas</button>

  <div id="id<?php echo $row["id_roupa"]; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-khaki"> 
        <span onclick="document.getElementById('id<?php echo $row["id_roupa"]; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Lojas que possuem <b><?php echo $row["nome_roupa"]; ?></b> </h2>
      </header>
      <div class="w3-container">
        <span onclick="document.getElementById('id<?php echo $row["id_roupa"]; ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
         <?php
            $id_roupa = $row["id_roupa"];
            $sql_r = "SELECT id_loja, quantidade FROM roupa_loja WHERE id_roupa=$id_roupa";
            $result_r = $con->query($sql_r);
            if ($result_r->num_rows > 0) {
              echo "<br><table class='w3-table-all'>
                      <thead>
                      <tr class='w3-light-grey'>
                      <th>Nome</th>
                      <th>Quantidade</th>
                      </thead>";
              while($row = $result_r->fetch_assoc()) {
                $id_loja = $row["id_loja"];
                $quantidade = $row["quantidade"];
                $sql_n = "SELECT nome_loja FROM loja WHERE id_loja=$id_loja ORDER BY nome_loja";
                $result_n = $con->query($sql_n);
                while($row = $result_n->fetch_assoc()) {
                  echo "<tr><td>".$row["nome_loja"]."</td>";
                  echo "<td>".$quantidade."</td></tr>";
                }
              }
              echo "</table><br>";
            }else{
              echo "<p>Nenhuma loja possui esta roupa em seu estoque.</p>";
            }
            ?>
      </div>
    </div>
  </div>
</div>
           
      </td>
    </tr>
       <?php

       
    }
} else {
    echo "Não existem roupas cadastradas.";
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