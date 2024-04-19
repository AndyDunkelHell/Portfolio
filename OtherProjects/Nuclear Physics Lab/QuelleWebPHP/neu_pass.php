<?php 
include_once 'includes/dbh.inc.php';

session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
	if (isset($_POST['mode'])){
    $mode = $_POST['mode'];
}else{
    $mode = 'Admin';  
};



$neu_pass = $_POST['neu_pass'];

$sql_edit = "UPDATE users SET pass = '$neu_pass' WHERE mode = '$mode';";
	$del_q = mysqli_query($conn, $sql_edit);
}else{
    header('Location: login.php?error');
    
    
};


	

?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>

<form method="POST" action='index.php'>
			 <button type="submit" name = "pass" value = "<?php echo $neu_pass; ?>">Home</button>
			</form>	
<body>

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
	<link rel="stylesheet" href="public/app1.css"> 

    <div class="flex-container">	
	<div class="container">

		<h1>Passwort geaendert! </h1>
			

			 
		
 	</div>
</div>
 










</body>
</html>

