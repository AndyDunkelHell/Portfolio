<?php 
include_once 'includes/dbh.inc.php';
session_start();
if (!empty($_SESSION['pass'])){
	session_destroy();
	session_abort();
    
}else{
	session_destroy();
    session_abort();
};



?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>
<body>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
	<link rel="stylesheet" href="public/app1.css"> 

<div class="flex-container">
	<h1>Kernphysik Labor<br>FH Aachen</h1>
	<div class="container">
		
 
			<p class="lead">Bitte <strong>Passwort</strong> eingeben </p>
			<form method="POST" action='index.php'>
			 <input type="password" class="form" name="pass" placeholder="Passwort" required/> <button>Einloggen</button>
			</form>
 	</div>
</div>









</body>
</html>

