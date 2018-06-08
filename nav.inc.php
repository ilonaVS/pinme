<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>
<body>

<div class="navbar">
  <a href="index.php" id="home_btn" class="nav_btn">Home</a>
  <a href="melding_1.php" id="melding_btn" class="nav_btn">Melding</a>
  
  <a href="#" id="dossier_btn" class="nav_btn">Dossier</a>
</div>


	<nav class="verborgen">
	<ul>
		<li><a href="dossier.php">Mijn meldingen</a></li>
		<li><a href="profiel.php">Instellingen</a></li>
	</ul>
</nav>



	<script>
	
		var knop = document.querySelector("#dossier_btn");
		var nav = document.querySelector(".verborgen");
		var nav2 = document.querySelector(".verborgen2");
		
		knop.addEventListener("click", menuOpenDicht);
		function menuOpenDicht(evt){
			nav.classList.toggle("verborgen");
	
		}
		
	
		
	</script>

</body>
</html>


