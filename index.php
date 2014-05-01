 <?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<html>
<form method="POST" action="?">
<input type="text" value="gerard" name="userin" maxlength="6" />
<input type="submit" value="submit" name="submit" />
</form>
<?php

$goedewoord = "koekje";
// Als de counter nog niet bestaat, vul hem met 0.
if(empty($_SESSION['counter'])) { $_SESSION['counter'] == 0; }
$_SESSION['counter']++ ;
if(!empty($_POST['userin']))
{
	if(isset($_SESSION['woord']) || !empty($_SESSION['woord']) || $_SESSION['woord'] != "")
	{
			$_SESSION['woord'][$_SESSION['counter']][$i]= str_split($_POST['userin']);
	}
	else
	{
		for ($i = 0; $i <= 5; $i++)
		{
			$_SESSION['woord'][$_SESSION['counter']][$i]= $_POST['userin']{$i};
			$_SESSION['goedewoord'][$_SESSION['counter']][$i] = $goedewoord{$i};
		}
		
	}
			for($k = 0; $k <=$_SESSION['counter']; $k++)
			{
				for($l = 0; $l <=5; $l++)
				{
					if($_SESSION['woord'][$l][$k] == $_SESSION['goedewoord'][2][$l])
					{
					echo "Goed gerarden!";
					}
				}

			}

		
	echo "<pre>";
	print_r($_SESSION['woord']);
	print_r($_SESSION['goedewoord']);
	echo "</pre>";
	if($_POST['userin'] == "delete") { session_destroy(); header("Location: index.php"); }
}
?>
</html>
