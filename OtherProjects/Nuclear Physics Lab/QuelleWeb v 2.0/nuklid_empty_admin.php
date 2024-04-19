<?php 
	include_once 'includes/dbh.inc.php';
	session_start();
	$art_s = $_SESSION['nuklid'];
	
    if (!empty($_SESSION['pass'])){
        $pass = $_SESSION['pass'];
    }else{
        header('Location: login.php?error');
        
        
    };

	

	$sql_first = "SELECT * FROM nuklide JOIN backgrounds ON nuklide.art = backgrounds.background_art WHERE art = '$art_s';";

	$first_res = mysqli_query($conn, $sql_first);
    $result_check = mysqli_num_rows($first_res);

    if ($result_check > 0){
		$first = mysqli_fetch_assoc($first_res);
  
    };
?>

<!DOCTYPE html>
<head>
    <title>Nuklid Art</title>
</head>
<body>


	<link rel="stylesheet" href="public/app_nuklid.css"> 
	
<div class="row" >
  <div class="column">
	  <div class="crop">
	  <img src = "<?php echo $first['link']; ?>" alt = "Bild nicht vorhanden" >
	  </div>
	</div>
 <div class="row" >

	 <form method="POST" action='index.php'>
			 <button type="submit" name = "pass" value = "<?php echo $pass; ?>">Home</button>
			</form>	


	 <div class="column">
	  <li class="lead"> Zerfalls-Art: <?php echo $first['strahlungsart']; ?> </li>
		<li class="lead"> Prozent (+/-): <?php echo $first['prozent']; ?> </li>
		<li class="lead"> Z= <?php echo $first['z']; ?></li>
		<li class="lead"> N= <?php echo $first['n']; ?></li>
	
 <form method="POST" action='delete_nuklid.php'>
			 <button type="submit" name="delete_nuklid" onclick="return confirm('Loeschen?');"  value="<?php  echo $art_s ?>">Loeschen</button>
			</form>
	
	

		 
	 </div>
	</div>

	</div>








</body>
</html>

