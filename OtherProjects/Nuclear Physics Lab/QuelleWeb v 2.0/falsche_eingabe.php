<?php 
include_once 'includes/dbh.inc.php';

session_start();

if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};

?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>

<form method="POST" action='index.php'>
			 <button type="submit" name = "pass" value = "<?php echo $pass; ?>">Home</button>
			</form>	
<body>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
	<link rel="stylesheet" href="public/app1.css"> 

    <div class="flex-container">	
	<div class="container">

		<h1>Falsche Eingabe! </h1>
			

			 
		
 	</div>
</div>
 










</body>
</html>

