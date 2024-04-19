<?php 
include_once 'includes/dbh.inc.php';
session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};


    $sql = "SELECT * FROM preparate ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

	

    if ($result_check > 0){
		
		$row = mysqli_fetch_assoc($result);

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

		<h1>Neues Praeparat hinzufuegen!</h1>
			
		<form method="POST" action='confirm.php'>
			<li class="lead">Bitte <strong>Praeparate Nr.</strong> </li>
			 	<input type="text" class="form" name="preparate_nr" placeholder="Praeparate Nr." required/>
			<li class="lead">Bitte <strong>Nuklide Art</strong> eingeben </li>
				<input type="text" class="form" name="nuklid" placeholder="Nuklid" required/ >
			<li class="lead">Bitte <strong>Bezugsdatum (YYYY-MM-DD)</strong> eingeben </li>
				<input type="text" class="form" name="bezugsdatum" placeholder="YYYY-MM-DD" required/ >
			<li class="lead">Bitte <strong>Anfangs Aktiviaet in Bq</strong> eingeben </li>
				<input type="text" class="form" name="a_null" placeholder="Aktiviaet" required/ >
			<li class="lead">Bitte <strong>Link zum Bild</strong> eingeben </li>
				<input type="text" class="form" name="img_link" placeholder="Link" required/ >
			<li class="lead">Bitte <strong>Zerfalls-Art</strong> waehlen:</li>
			<label for="typ"></label>
  			<select name="typ" id="typ">
      			<option value="Neutron">Neutron</option>
      			<option value="Alpha">Alpha</option>
				<option value="Beta Minus">Beta Minus</option>
      			<option value="Beta Plus">Beta Plus</option>
				<option value="Epsylon">Epsylon</option>
			</select>
			
			
			<label for="id">ID</label>
  			<select name="id" id="id">
      			<option value= "<?php echo $row['id'] + 1 ?>" > <?php echo $row['id'] + 1 ?></option>
      			
			</select>
			
		
			<button>Hinzufuegen!</button>
		
			</form>

			 
		
 	</div>
</div>
 

  
   <?php 
        
 
       
    }else{
        header('Location: index.php?error');
    };


   ?>








</body>
</html>

