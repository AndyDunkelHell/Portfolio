<?php 
include_once 'includes/dbh.inc.php';

session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');   
};

if (isset($_POST['sort'])){
    $sort = $_POST['sort'];
	$sort_opt = $_POST['sort'];

        if($sort_opt == 'id'){
            
            $option1 = 'ID';

        }elseif($sort_opt == 'a_null'){
            
            $option1 = 'Anfangs Aktivitaet';

        }elseif ($sort_opt == 'age_y'){
            
            $option1 = 'Alter in Jahre';

        }else{
			$option1 = 'Aktuelle Aktivitaet';
			
		};
    
}else{
	
    $option1 = 'ID';   
    $sort = 'id';
};

 if($option1 == 'ID'){

        $value1 = 'id';
        $value2 = 'a_null';
        $value3 = 'age_y';
		$value4 = 'aktuelle';
        
        $option2 = 'Anfangs Aktivitaet';
        $option3 = 'Alter in Jahre';
		$option4 = 'Aktuelle Aktivitaet';

    }elseif($option1 == 'Anfangs Aktivitaet'){
        
        $value1 = 'a_null';
        $value2 = 'id';
		$value3 = 'age_y';
        $value4 = 'aktuelle';
        
        $option2 = 'ID';
        $option3 = 'Alter un Jahre';
		$option4 = 'Aktuelle Aktivitaet';

    }elseif ($option1 == 'Alter in Jahre'){

        $value1 = 'age_y';
        $value2 = 'a_null';
        $value3 = 'id';
		$value4 = 'aktuelle';
        
        $option2 = 'Anfangs Aktivitaet';
        $option3 = 'ID';
		$option4 = 'Aktuelle Aktivitaet';
        
    }else{
		
		$value1 = 'aktuelle';
        $value2 = 'a_null';
        $value3 = 'id';
		$value4 = 'age_y';
        
        $option2 = 'Anfangs Aktivitaet';
        $option3 = 'ID';
		$option4 = 'Alter in Jahre';
		
	};

$sql = "SELECT preparate.id AS id, preparate.a_null AS anull, preparate.preparate_nr AS nr, nuklide.art AS art , TIMESTAMPDIFF(YEAR, preparate.bezugsdatum, CURDATE()) AS age_y, CAST(preparate.a_null*EXP(-TIMESTAMPDIFF(YEAR, preparate.bezugsdatum, CURDATE())*31536000*nuklide.lambda) AS UNSIGNED) AS aktuelle FROM preparate INNER JOIN nuklide ON  preparate.nuklide_art = nuklide.art ORDER BY $sort;";
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
<form action="preparat_tabelle_all.php" method="post">	
<label for="sort"></label>
  			<select name="sort" id="sort">
			
			<option value="<?php echo $value1; ?>"><?php echo $option1; ?></option>
      			<option value="<?php echo $value2; ?>"><?php echo $option2; ?></option>
				<option value="<?php echo $value3; ?>"><?php echo $option3; ?> </option>
				<option value="<?php echo $value4; ?>"><?php echo $option4; ?> </option>
	
			</select>
			 <button>Sortieren nach</button>
			</form>
<table border="1" cellpadding="7" cellspacing="7">
  <tr>
    <th>ID</th>
    <th>Praeparate Nr. </th>
    <th>Nuklid</th>
    <th>Alter in Jahre</th>
    <th>Anfangs Aktivitaet in Bq</th>
	<th>Aktuelle Aktivitaet in Bq</th>
    
	
  
  
	
 

  
   <?php 
         

        while ($row = mysqli_fetch_assoc($result)) {
			$a_null_sc = sprintf("%.2E" ,$row['anull']);
			$a_akt_sc = sprintf("%.2E" ,$row['aktuelle']);
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><form action='aktuelle_akt_admin.php' method='post'> <button type='submit' name='preparate_nr' value='".$row['nr']."' class='btn-link'>" . $row['nr'] . "</button>
		</form></td>";
            echo "<td><form action='nuklid_admin.php' method='POST'> <button type='submit' name='nuklid' value='". $row['art'] ."' class='btn-link'>" . $row['art'] . "</button>
		</form></td>";

            echo "<td>" . $row['age_y'] . "</td>";
            echo "<td>" . $a_null_sc . "</td>";
            echo "<td>" . $a_akt_sc . "</td>";
            
        
            echo "</tr>";

        };
        

        
    };

   ?>


</table>



	</div>








</body>
</html>

