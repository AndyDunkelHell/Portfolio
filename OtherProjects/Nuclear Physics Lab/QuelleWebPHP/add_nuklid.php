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
    <title>Add Nuklid</title>
</head>
<body>

<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
<link rel="stylesheet" href="public/app1.css">

 <form method="POST" action='index.php'>
			 <button type="submit" name = "pass" value = "<?php echo $pass; ?>">Home</button>
			</form>	

<div class="flex-container">	
	<div class="container">

		<h1>Neues Nuklid hinzufuegen!</h1>
			
		<form method="POST" action='confirm_nuklid.php'>
			<li class="lead">Bitte <strong>Nuklid Art eingeben:</strong> </li>
			 	<input type="text" class="form" name="art" placeholder="Nuklid Art " required/>
			
			<li class="lead">Bitte <strong>Zerfalls Art</strong> waehlen </li>
  			<select name="strahlungsart" id="strahlungsart">
      			<option value="Neutron">Neutron</option>
      			<option value="Alpha">Alpha</option>
				<option value="Beta Minus">Beta Minus</option>
      			<option value="Beta Plus">Beta Plus</option>
				<option value="Epsylon">Epsylon</option>
			</select>
			
			<li class="lead">Bitte <strong>Prozent (+/-)</strong> eingeben </li>
				<input type="text" class="form" name="prozent" placeholder="Prozent (+/-)" required/ >
			<li class="lead">Bitte <strong>Z Anzahl</strong> eingeben </li>
				<input type="text" class="form" name="z" placeholder="Z Anzahl" required/ >
			
			<li class="lead">Bitte <strong>N Anzahl</strong> eingeben </li>
				<input type="text" class="form" name="n" placeholder="N Anzahl" required/ >
			<li class="lead">Bitte <strong>Halbwertszeit in Sekunden</strong> eingeben </li>
				<input type="text" class="form" name="halbwertszeit_s" placeholder="Halbwertszeit in Sekunden" required/ >
			
			<li class="lead">Bitte <strong>Link zum Bild</strong> eingeben </li>
				<input type="text" class="form" name="link" placeholder="Link" required/ >
		
			<button>Hinzufuegen!</button>
		
			</form>

			 
		
 	</div>
</div>




</body>
</html>

