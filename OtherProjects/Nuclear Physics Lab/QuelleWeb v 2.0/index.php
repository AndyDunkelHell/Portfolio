<?php 
include_once 'includes/dbh.inc.php';
session_start();

//Back Button
$_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];
    $pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE pass =?;";
// Create Prepare Statement
$stmt = mysqli_stmt_init($conn);
// Prepare Stmt
if(!mysqli_stmt_prepare($stmt, $sql)){
    header('Location: login.php?error2');
}else{
    //Bind
	mysqli_stmt_bind_param($stmt, "s", $pass);
	//Run
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);
	$result_check = mysqli_num_rows($result);




    if ($result_check > 0){
        $row = mysqli_fetch_assoc($result);

        $mode = $row['id'];
        
        $_SESSION['pass'] = $pass;

        if ($mode == 1){
            
            header('Location: index_guest.php?sucess');
            
        };

        
        

    }else{

        header('Location: login.php?error_falsches_passwort!' );
        

    };


};


?>

<!DOCTYPE html>
<head>
    <title>Home</title>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
<link rel="stylesheet" href="public/app1.css">




<div class="flex-container">
	<form method="GET" action='login.php'>
			 <button>Logout</button>
			</form>	
	<h1>Radioaktive Quellen Admin</h1>
	<div class="container">
		
 
			<li class="lead">Bitte <strong>Nuklid</strong> eingeben (Bsp. Am-241, Th-232...) </li>
			<form method="POST" action='nuklid_admin.php'>
			 <input type="text" class="form" name="nuklid" placeholder="Nuklid" required/> <button>Nuklid Info</button>
 			
			</form>

			<li class="lead">Bitte <strong>Präparate Nr.</strong> eingeben </li>
			<form method="POST" action='aktuelle_akt_admin.php'>
			<input type="text" class="form" name="preparate_nr" placeholder="Praeparat" required/ >
			 <button>Praeparat anzeigen!</button>
			</form>

			<li class="lead">Bitte <strong>Zerfalls-Art</strong> wählen:</li>
			
		<form method="POST" action='strahlungs_art_admin.php'>
			<label for="typ"></label>
  			<select name="typ" id="typ">
      			<option value="Neutron">Neutron</option>
      			<option value="Alpha">Alpha</option>
				<option value="Beta Minus">Beta Minus</option>
      			<option value="Beta Plus">Beta Plus</option>
				<option value="Epsylon">Epsylon</option>
			</select>
			 <button>Nach Strahlungsart suchen</button>
			</form>
			
			
			<li class="lead"><strong>Quelle Liste anshen</strong></li>
			<form method="POST" action='quelleliste_admin.php'>
			 <button>Zeigen!</button>
			</form>
		 
		<li class="lead">Andere <strong>Funktionen!</strong></li>
		
		<form method="POST" action='funktionen.php'>
			<label for="funk"></label>
  			<select name="funk" id ="funk">
      			<option value= 0 >Neue Nuklidart hinzufügen</option>
      			<option value= 1 >Aktuelle Aktivität alle Präparate</option>
				<option value= 2 >Präparate mit Aktivität = 0 </option>
				<option value= 3 >Edit Passwort</option>
			
			</select>
			 <button>Start</button>
			</form>
 	</div>
</div>









</body>
</html>