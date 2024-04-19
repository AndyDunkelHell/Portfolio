<?php 
include_once 'includes/dbh.inc.php';

session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};

$sql = "SELECT preparate.id AS id, preparate.a_null AS anull, preparate.preparate_nr AS nr, nuklide.art AS art, TIMESTAMPDIFF(YEAR, preparate.bezugsdatum, CURDATE()) AS age_y FROM preparate INNER JOIN nuklide ON preparate.nuklide_art = nuklide.art WHERE preparate.a_null*EXP(-TIMESTAMPDIFF(YEAR, preparate.bezugsdatum, CURDATE())*31536000*nuklide.lambda) <  1 ;";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    if ($result_check > 0){
		

?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>

<form method="POST" action='index.php'>
			 <button type="submit" name = "pass" value = "<?php echo $pass; ?>">Home</button>
			</form>	
<body>


	<link rel="stylesheet" href="public/app.css"> 

<div class="row" >	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>
    <th>ID</th>
    <th>Praeparate Nr. </th>
    <th>Nuklid</th>
    <th>Alter in Jahre</th>
    <th>Anfangs Aktivitaet in Bq</th>
    
	
  
  
	
 

  
   <?php 
         

        while ($row = mysqli_fetch_assoc($result)) {
			$a_null_sc = sprintf("%.2E" ,$row['anull']);
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><form action='aktuelle_akt_admin.php' method='post'> <button type='submit' name='preparate_nr' value='".$row['nr']."' class='btn-link'>" . $row['nr'] . "</button>
		</form></td>";
            echo "<td><form action='nuklid_admin.php' method='POST'> <button type='submit' name='nuklid' value='". $row['art'] ."' class='btn-link'>" . $row['art'] . "</button>
		</form></td>";

            echo "<td>" . $row['age_y'] . "</td>";
            echo "<td>" . $a_null_sc . "</td>";
        
            
        
            echo "</tr>";

        };
        

        
    };

   ?>


</table>



	</div>








</body>
</html>

