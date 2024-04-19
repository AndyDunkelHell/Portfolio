<?php 
include_once 'includes/dbh.inc.php';
session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};

	$preparate_nr = $_POST['preparate_nr'];
    $nuklid = $_POST['nuklid'];
    $bezugsdatum = $_POST['bezugsdatum'];
    $a_null = $_POST['a_null'];
    $img_link = $_POST['img_link'];
    $typ = $_POST['typ'];
    $id = $_POST['id'];

	$sql_add_typ = "INSERT INTO zw_strahlungs (typ, nuklid, id) VALUES ('$typ', '$nuklid', $id ); ";
    $sql_add = "INSERT INTO preparate (id, preparate_nr, nuklide_art, bezugsdatum, a_null, img_link) VALUES ( $id, '$preparate_nr','$nuklid' , '$bezugsdatum', $a_null, '$img_link'); ";
    mysqli_query($conn, $sql_add_typ);
    mysqli_query($conn, $sql_add);


    
?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>

<form method="POST" action='delete.php'>
			 <button type="submit" name="id" value="<?php echo $id ?>">Stornieren</button>
		</form>	
<body>


	<link rel="stylesheet" href="public/app1.css"> 

<div class="row" >
  <div class="column">
	  <div class="crop">
	  <img src = '<?php echo $img_link ?>' alt = "Bild nicht vorhanden" >
	  </div>
	</div>
<div class="row" >	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>

    <th>ID </th>
	<th>Praeparate Nr. </th>
    <th>Nuklid</th>
    <th>Bezugsdatum</th>
	<th>Anfangs Aktivitaet in Bq</th>
    <th>Bild Link</th>
    <th>Zerfalls-Art</th>

	
 

  
   <?php 
        


        echo "<tr>";
        echo "<td>" . $id . "</td>";
        echo "<td>" . $preparate_nr . "</td>";
        echo "<td>" . $nuklid . "</td>";
  
        echo "<td>" . $bezugsdatum . "</td>";
        echo "<td>" . $a_null . "</td>";
        echo "<td>" . $img_link . "</td>";
        echo "<td>" . $typ . "</td>";
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

