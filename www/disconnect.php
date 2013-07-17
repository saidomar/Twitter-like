<html lang="en">
<?php
session_start(); 
unset($_SESSION['login']);
unset($_SESSION['password']);
header('Location: index.php');
?>
</html>
