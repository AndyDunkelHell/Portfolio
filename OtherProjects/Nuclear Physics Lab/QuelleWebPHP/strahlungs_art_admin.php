<?php 
include_once 'includes/dbh.inc.php';
	$typ = $_POST['typ'];
    
    session_start();
    $_SESSION['typ']= $typ;

    //Back Button
    $_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];
    
    if (!empty($_SESSION['pass'])){
        $pass = $_SESSION['pass'];
    }else{
        header('Location: login.php?error');
        
        
    };

	$sql = "SELECT zw_strahlungs.typ, zw_strahlungs.nuklid, zw_strahlungs.id , preparate.preparate_nr AS preparate_nr_art FROM zw_strahlungs JOIN preparate ON zw_strahlungs.id = preparate.id WHERE zw_strahlungs.typ = '$typ';";
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
    <th>Zerfalls-Art </th>
    <th>Nuklid</th>
	<th>Praeparate Nr. </th>
  
  
	
 

  
   <?php 
         

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['typ'] . "</td>";
            echo "<td><form action='nuklid_admin.php' method='POST'> <button type='submit' name='nuklid' value='". $row['nuklid'] ."' class='btn-link'>" . $row['nuklid'] . "</button>
		</form></td>";
            
            echo "<td><form action='aktuelle_akt_admin.php' method='POST'> <button type='submit' name='preparate_nr' value='".$row['preparate_nr_art']."' class='btn-link'>" . $row['preparate_nr_art'] . "</button>
		</form></td>";
            echo "</tr>";

        };
        

        
    };

   ?>


</table>



	</div>








</body>
</html>

