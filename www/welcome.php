<html lang="en">
<?php
session_start(); 
if (!isset($_SESSION['login']) & !isset($_SESSION['password']))
{
	header('Location: login.php');
}
?>
  <head>
    <meta charset="utf-8">
    <title>Template &middot; Twitter-like</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Twitter-like for pentesting">
    <meta name="author" content="Mahamoud SAID OMAR">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>
    
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="welcome.php">Home</a></li>
          <?php echo '<li><a href="disconnect.php">'.$_SESSION['login'].'(disconnect)</a></li>'?>
        </ul>
        <h3 class="muted">Twitter-Like</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <a class="btn btn-medium btn-success" href="message.php">New message</a>
        <h2>List of messages</h2>
        
        <?php
	// on se connecte à MySQL
	$db = mysql_connect('localhost', 'root', 'root');

	// on sélectionne la base
	mysql_select_db('twitter',$db);

	// on crée la requête SQL
	$sql = 'SELECT * FROM list_messages ORDER BY id DESC';

	// on envoie la requête
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

	// on fait une boucle qui va faire un tour pour chaque enregistrement
	while($data = mysql_fetch_assoc($req))
	    {
	      // on affiche les informations de l'enregistrement en cours
	      echo '<h3>'.$data['login'].'</h3>';
	      echo '<p class="lead">'.$data['send_message'].'</p>';
	    }

	// on ferme la connexion à mysql
	mysql_close();
	?>
	
      </div>

      <hr>

      <hr>

      <div class="footer">
        <p>&copy; ESIEA 2013</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
