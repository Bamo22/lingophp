<?php 
session_start(); 
error_reporting(0);		
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Lingo</title>
    </head>
    <body>
        <h1>Lingo</h1>
        <table border="2px"/>
            <form action="" method="post" />
            	<tr><td><input maxlength="5" type="text" name="ingv" /></td></tr>
                <tr><td><input type="submit" value="start" title="start" name="start"/></td>	
                <td><input type="submit" value="reset" title="reset" name="reset"/></td></tr>
			</form>
       </table>
<?php
echo '<table border="solit">';
if(isset($_POST['start'])){	
	$_SESSION['pogingen']++;
	$_SESSION['word'][$_SESSION['pogingen']] = str_split($_POST['ingv']);
	//$_SESSION['end'] .= implode($_SESSION['word'][$_SESSION['pogingen']]);
	$green = '#66e72d';
	$yellow = '#f9fc00';
	$gray = '#b4b6bc';
	
		for($t = 0; $t <= 4; $t++){
				if($_SESSION['word'][$_SESSION['pogingen']][$t] == $_SESSION['word']['randword'][$t]){
						$_SESSION['word'][$_SESSION['pogingen']]['colors'][$t] = $green;
				}
				else if($_SESSION['word'][$_SESSION['pogingen']][$t] != $_SESSION['word']['randword'][$t] && strpos($_SESSION['word']['randword'], $_SESSION['word'][$_SESSION['pogingen']][$t])){
						$_SESSION['word'][$_SESSION['pogingen']]['colors'][$t] = $yellow;
				}else{
						$_SESSION['word'][$_SESSION['pogingen']]['colors'][$t] = $gray;
				}
		}
		$x = 0;
	if($_SESSION['pogingen'] < 6){
		while($x < $_SESSION['pogingen']){
			echo "<tr>";
				for($u = 0; $u <= 4; $u++){
					echo '<td bgcolor="'.$_SESSION['word'][$_SESSION['pogingen']]['colors'][$u].'"/>'.$_SESSION['word'][$_SESSION['pogingen']][$u].'</td>';
					}
			echo "</tr>";
			$x++;
		}
	}
else{
echo "<strong>Je hebt het antwoord niet geraden binnen 5 pogingen, het antwoord was: ".implode($_SESSION['word']['randword'])."</strong>";	
}
}
if(!isset($_SESSION['pogingen'])){
	$i = rand(0, 3);
	$randword = array("taart", "stoer", "baart", "zusje");
	$_SESSION['word']['randword'] = str_split($randword[$i]);
	echo '<table border="solit"><tr><td/>'.$_SESSION['word']['randword'][0].'</td></tr></table>';
}
if(isset($_POST['reset'])){
	unset ($_SESSION['end']);
	unset ($_SESSION['pogingen']);
	unset ($_SESSION['word']);
}

echo "</table>";
print_r($_SESSION['pogingen']);
echo "<pre>";
	print_r($_SESSION['word']);
echo "</pre>";

?>  
   
    </body>
</html>
