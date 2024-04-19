<?php 
	include_once 'includes/dbh.inc.php';
	session_start();
   
    if (!empty($_SESSION['pass'])){
        $pass = $_SESSION['pass'];
    }else{
        header('Location: login.php?error');
        
        
    };

	$art = $_POST['nuklid'];
	
	if (isset($_POST['sort'])){
        $sort = $_POST['sort'];
		
    }else{
        $sort = 'id';
    };
	


    $sql = "SELECT * FROM nuklide  JOIN preparate  ON nuklide.art = preparate.nuklide_art WHERE art = ? ORDER BY ?;";	
	$sql_first = "SELECT * FROM nuklide JOIN backgrounds ON nuklide.art = backgrounds.background_art WHERE art = ?;";

	$stmt1 = mysqli_stmt_init($conn);
	$stmt2 = mysqli_stmt_init($conn);

	
	if(!mysqli_stmt_prepare($stmt1, $sql)){
		
		header('Location: index_guest.php?error');

        
    }else{
		mysqli_stmt_prepare($stmt2, $sql_first);
        //Bind
		mysqli_stmt_bind_param($stmt1, "ss", $art, $sort);
		mysqli_stmt_bind_param($stmt2, "s", $art);
		//Run
		mysqli_stmt_execute($stmt1);
		mysqli_stmt_execute($stmt2);

		$result = mysqli_stmt_get_result($stmt1);
		$first_res = mysqli_stmt_get_result($stmt2);
		$result_check = mysqli_num_rows($result);
        $result_check_first = mysqli_num_rows($first_res);
		if ($result_check > 0){
		$first = mysqli_fetch_assoc($first_res);
    

	
	
    


    


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
		<form action="nuklid.php" method="post"> 

			<label for="sort"></label>
  			<select name="sort" id="sort">
      			<option value="a_null">Anfangs Aktivitaet</option>
      			<option value="bezugsdatum">Bezugsdatum</option>
				<option value="id">ID</option>
	
			</select>
			 <button type="submit" name="nuklid" value="<?php echo $art; ?>">Sortieren nach</button>
			</form>


				

	
	
	
	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>

    <th>ID</th>
    <th>Praeparate Nr.</th>
    <th>Bezugsdatum (MM/DD/YYYY)</th>
	<th> Anfangs Aktivitaet in Bq</th>
	
 

  
   <?php 
        
        while ($row = mysqli_fetch_assoc($result)){

            $a_null_sc = sprintf("%.2E" ,$row['a_null']);

            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><form action='aktuelle_akt.php' method='post'> <button type='submit' name='preparate_nr' value='".$row['preparate_nr']."' class='btn-link'>" . $row['preparate_nr'] . "</button>
		</form></td>";
            echo "<td>" . $row['bezugsdatum'] . "</td>";
            echo "<td>" . $a_null_sc . "</td>";
            echo "</tr>";

        };

        
    }elseif($result_check_first > 0){
		$_SESSION['nuklid'] = $art;
        header('Location: nuklid_empty.php');
      
    }else{
		
        header('Location: falsche_eingabe.php?guest');
    };
	 };

	?>


</table>
		 
	 </div>
	</div>

	</div>








</body>
</html>

