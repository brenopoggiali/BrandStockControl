<?php require 'header.php' ?>

 <script>
document.title = 'Cadastrar roupa - Nordstrom'; 
</script>

<div class="w3-card">
	<div class="w3-container w3-light-grey">
	  <h2>Cadastrar Roupa</h2>
	</div>

	<form method="POST" action="cadastro_roupa_code.php" class="w3-container">
		<label>Nome </label> <input class="w3-input" type="text" name="cadastrarroupa" required><br>
		<button type="submit" class="w3-button w3-khaki w3-hover-light-grey">Cadastrar</button>
	</form>
	<br>
</div> 
<?php require 'footer.php' ?>