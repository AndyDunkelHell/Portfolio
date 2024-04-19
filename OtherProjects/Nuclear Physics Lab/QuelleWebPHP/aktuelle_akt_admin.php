<?php 
include_once 'includes/dbh.inc.php';
session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};


	$preparate_nr = $_POST['preparate_nr'];
    $_SESSION['preparate_nr'] = $preparate_nr;
    $stmt = mysqli_stmt_init($conn);
	$sql = "SELECT preparate.id AS id, preparate.a_null AS anull, preparate.preparate_nr AS nr, nuklide.art AS art , TIMESTAMPDIFF(YEAR, preparate.bezugsdatum, CURDATE()) AS age_y, CAST(preparate.a_null*EXP(-TIMESTAMPDIFF(YEAR, preparate.bezugsdatum, CURDATE())*31536000*nuklide.lambda) AS UNSIGNED) AS aktuelle, preparate.img_link FROM preparate INNER JOIN nuklide ON  preparate.nuklide_art = nuklide.art WHERE preparate.preparate_nr = ? ;";
    $url = $_SESSION['redirectURL'];
    

    if(!mysqli_stmt_prepare($stmt, $sql)){
		
		header('Location: index.php?error');
        $_SESSION['pass'] = 'langer987';

        echo $url;
    }else{
        //Bind
		mysqli_stmt_bind_param($stmt, "s", $preparate_nr);
		//Run
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
        $result_check = mysqli_num_rows($result);
        
		
    if ($result_check > 0){
		$row = mysqli_fetch_assoc($result);
		
		if($url == '/nuklid_admin.php'){
            
            $post = $row['art'];
            $name = 'nuklid';
            
        }elseif($url == '/quelleliste_admin.php'){
            
            $post = 'id';
            $name = 'sort';
            
        }elseif($url == '/strahlungs_art_admin.php'){
            $post = $_SESSION['typ'];
            $name = 'typ';
            
            
        }else{
            //Back Button
            $post = $pass;
            $name = 'pass';
            
            
            $_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];
            

        };
   
    


?>

<!DOCTYPE html>
<head>
    <title>Quelleliste</title>
</head>

<div class="flex">
<form method="POST" action='index.php'> <button type="submit" name = "pass" value = "<?php echo $pass; ?>" class="flex-child">Home</button> </form>	

<form method="POST" action='<?php echo $url; ?>'> <button type="submit" name = "<?php echo $name;  ?>" value = "<?php echo $post; ?>" class="flex-child">Back</button> </form>

<form method="POST" action='quelleliste.php'> <button type="submit" name = "sort" value = "id" class="flex-child">Quelleliste</button> </form>


</div>


	<link rel="stylesheet" href="public/app1.css"> 

<div class="row" >
  <div class="column">
	  <div class="crop">
	  <img src = '<?php echo $row['img_link']?>' alt = "Bild nicht vorhanden" >
	  <style>
      img {
        max-width: 500px;
        height: auto;
      }
    </style>
	  </div>
	</div>
<div class="row" >	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>

    <th>ID </th>
	<th>Praeparate Nr. </th>
    <th>Nuklid</th>
    <th>Alter in Jahre</th>
	<th>Aktuelle Aktivitaet in Bq</th>
	
 

  
   <?php 
        
        $a_akt_sc = sprintf("%.2E" ,$row['aktuelle']);

        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nr'] . "</td>";
        echo "<td><form action='nuklid_admin.php' method='POST'> <button type='submit' name='nuklid' value='".$row['art']."' class='btn-link'>" . $row['art'] . "</button>
		</form></td>";
        echo "<td>" . $row['age_y'] . "</td>";
        echo "<td>" .$a_akt_sc . "</td>";
        echo "</tr>";

        
    }else{
        header('Location: falsche_eingabe.php?error');
    };
    };
    $_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];

   ?>


</table>
		 <form method="POST" action='delete.php'>
			 <button type="submit"  name="id" value="<?php echo $row['id'];?>" onclick="return confirm('Loeschen?');">Praeparat Loeschen!</button>
			</form>	



	</div></div>







</body>
</html>

