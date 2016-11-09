<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<base href="<?php echo $racineWeb?>">
	<title> <?= $titre ?> </title>
	<style>
	.boite
	{
		text-align:center;
	}
	</style>
</head>
<body>
<header>
                <a href=""><h1 id="titreClient"></h1></a>
                    <?php
                    if (isset($login) && $login != "") {
                        echo "<form action=connexion/deconnecter>";
                        echo "<button>Déconnecter</button>";
                        echo "</form> <br/> Bonjour, " . $login . "";
                    } else {
                        echo "<form action=connexion>";
                        echo "<button>Se connecter</button>";
                        echo "</form><br/> ";
                    }
                    ?>
               
</header>
<div class = "boite">
	<?php echo $contenu ?>
</div>
</body>
</html>