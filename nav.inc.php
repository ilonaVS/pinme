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
    <div class="nav_div">
  <a href="index.php"><img src="images/pinME_homebtn.png" alt="home icon" class="nav_icon"></a>
  <?php if($_SERVER['REQUEST_URI'] == "/pinme/index.php"){
    echo '<div class="line"></div>';
    } ?>
    </div>
    
    <div class="nav_div">
  <a href="melding_1.php"><img src="images/pinme_meldingbtn.png" alt="melding icon" class="nav_icon"></a>
  <?php if($_SERVER['REQUEST_URI'] == "/pinme/melding_1.php" || $_SERVER['REQUEST_URI'] == "/pinme/melding_2.php" || $_SERVER['REQUEST_URI'] == "/pinme/melding_3.php" || $_SERVER['REQUEST_URI'] == "/pinme/melding_4.php" || $_SERVER['REQUEST_URI'] == "/pinme/melding_5.php"){
    echo '<div class="line"></div>';
    } ?>
    </div>
    
    <div class="nav_div" id="dossier_btn">
  <a href="#"><img src="images/pinme_dossierbtn.png" alt="dossier icon" class="nav_icon"></a>
  <?php if($_SERVER['REQUEST_URI'] == "/pinme/dossier.php" || $_SERVER['REQUEST_URI'] == "/pinme/profiel.php"){
    echo '<div class="line"></div>';
    } ?>
    </div>
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


