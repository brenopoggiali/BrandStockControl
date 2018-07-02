<!DOCTYPE html>
<html>
<head>
	<title>Início - Nordstrom</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="icon.png" type="image/png" sizes="16x16"> 

<style> 
body { 
  background-color: khaki; 
}
.w3-button, .w3-container{
	font-family: 'Cambria';
	transition: all .4s ease-in-out; 
}

.button:hover { transform: scale(4.5); }

</style>
</head>
<body>
<div class="w3-padding w3-display-middle">
	<div class="w3-container w3-center">
			<img src="Nordstrom_Logo.svg">
  <br><br>
</div> 
<div class="w3-bar w3-light-grey w3-center">
</div>
<div class="w3-center">
		<br>
		<a href="lojas.php"><div class="w3-button w3-khaki w3-hover-pale-yellow" style="padding: 60px; margin-right: 10px;">
		<img src="shop.svg" width="100px"><br><br>
		<b>Lojas</b></div></a>
		<a href="roupas.php"><div class="w3-button w3-khaki w3-hover-pale-yellow" style="padding: 60px">
		<img src="shirt.svg" width="100px"><br><br>
		<b>Roupas</b>
		</div></a>
		<br><br>
</div>
<br>
<footer class="w3-container w3-center">© 2018 UFMG Informática Jr. Todos os Diretos Reservados.</footer>
</div>
<?php require 'footer.php'?>