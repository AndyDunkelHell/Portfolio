<?php 
include_once 'includes/dbh.inc.php';

session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};
	$art = $_POST['art'];
    $strahlungsart = $_POST['strahlungsart'];
    $prozent = $_POST['prozent'];
    $z = $_POST['z'];
    $n = $_POST['n'];
    $halbwertszeit_s = $_POST['halbwertszeit_s'];
    $link = $_POST['link'];
    $lambda = log(2)/$halbwertszeit_s;

	$sql_add_bg = "INSERT INTO backgrounds (background_art, link) VALUES ('$art', '$link' ); ";
    $sql_add = "INSERT INTO nuklide (art, strahlungsart, prozent, z, n, halbwertszeit_s, lambda) VALUES ( '$art', '$strahlungsart','$prozent' , $z, $n, $halbwertszeit_s, $lambda ); ";
    mysqli_query($conn, $sql_add_bg);
    mysqli_query($conn, $sql_add);


    
?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>

<form method="POST" action='delete_nuklid.php'>
			 <button type="submit" name="delete_nuklid" value="<?php echo $art ?>">Stornieren</button>
		</form>	
<body>


	<link rel="stylesheet" href="public/app1.css"> 

<div class="row" >
  <div class="column">
	  <div class="crop">
	  <img src = '<?php echo $link ?>' alt = "Bild nicht vorhanden" >
	  </div>
	</div>
<div class="row" >	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>

    <th>Nuklid </th>
    <th>Zerfalls-Art</th>
	<th>Prozent(+/-) </th>
    <th>Anzahl Z</th>
    <th>Anzahl N</th>
	<th>Halbwertszeit in s</th>
    

	
 

  
   <?php 
        


        echo "<tr>";
        echo "<td>" . $art . "</td>";
        echo "<td>" . $strahlungsart. "</td>";
        echo "<td>" . $prozent . "</td>";
  
        echo "<td>" . $z . "</td>";
        echo "<td>" . $n . "</td>";
        echo "<td>" . $halbwertszeit_s . "</td>";
  
        echo "</tr>";

        
    //}else{
        //header('Location: index.php?error');
    //}

   ?>


</table>
		 <form method="POST" action='index.php'>
			 <button type="submit" name = "pass" value = "<?php echo $pass; ?>" >Bestaetigen!</button>
			</form>	



	</div>








</body>
</html>

