<html lang="en">
<?php
	session_start(); 
	$login = "'".sha1(htmlspecialchars(stripslashes($_POST["login"]), ENT_QUOTES))."'";
	$password = "'".sha1(base64_encode($login.htmlspecialchars(stripslashes($_POST["password"]), ENT_QUOTES)))."'";

	// on se connecte à MySQL
	$db = mysql_connect('localhost', 'root', 'root');

	// on sélectionne la base
	mysql_select_db('twitter',$db);

	// on crée la requête SQL
	$sql = "SELECT id FROM account WHERE login=".$login." AND password=".$password;

	// on envoie la requête
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$data = mysql_fetch_assoc($req);
	if(isset($data['id']))
	{
		$_SESSION['login']=$_POST["login"];
		$_SESSION['password']=$password;
		// on ferme la connexion à mysql
		mysql_close();
		header('Location: welcome.php');
	}
	else
	{
		echo 'KO!';
		// on ferme la connexion à mysql
		mysql_close();
		header('Location: login.php');
	}

	// on ferme la connexion à mysql
	mysql_close();

?>

</html>
