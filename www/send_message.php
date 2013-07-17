<?php
session_start(); 

// on se connecte à MySQL
$db = mysql_connect('localhost', 'root', 'root');

// on sélectionne la base
mysql_select_db('twitter',$db);

// on crée la requête SQL
$sql = 'INSERT INTO list_messages(login, send_message) VALUES (\''.$_SESSION['login'].'\', \''.$_POST['message'].'\')';

// on envoie la requête
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

// on ferme la connexion à mysql
mysql_close();

header('Location: welcome.php');
?>
