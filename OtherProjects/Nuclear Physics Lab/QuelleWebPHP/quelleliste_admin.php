<?php 
include_once 'includes/dbh.inc.php';

session_start();

if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};

//Back Button
$_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];



if (isset($_POST['sort'])){
    $sort = $_POST['sort'];
	     $sort_opt = $_POST['sort'];

        if($sort_opt == 'id'){
            
            $option1 = 'ID';

        }elseif($sort_opt == 'a_null'){
            
            $option1 = 'Anfangs Aktivitaet';

        }else{
            
            $option1 = 'Bezugsdatum';

        };
    
}else{
	
	$option1 = 'ID';
    $sort = 'id';
	
};

 if($option1 == 'ID'){

        $value1 = 'id';
        $value2 = 'a_null';
        $value3 = 'bezugsdatum';
        
        $option2 = 'Anfangs Aktivitaet';
        $option3 = 'Bezugsdatum';

    }elseif($option1 == 'Anfangs Aktivitaet'){
        
        $value1 = 'a_null';
        $value2 = 'id';
        $value3 = 'bezugsdatum';
        
        $option2 = 'ID';
        $option3 = 'Bezugsdatum';

    }else{

        $value1 = 'bezugsdatum';
        $value2 = 'a_null';
        $value3 = 'id';
        
        $option2 = 'Anfangs Aktivitaet';
        $option3 = 'ID';
        
    };



	$sql = "SELECT * FROM preparate ORDER BY $sort;";
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

<form action="quelleliste_admin.php" method="post"> 

			<label for="sort"></label>
  			<select name="sort" id="sort">
      			<option value="<?php echo $value1; ?>"><?php echo $option1; ?></option>
      			<option value="<?php echo $value2; ?>"><?php echo $option2; ?></option>
				<option value="<?php echo $value3; ?>"><?php echo $option3; ?> </option>
	
			</select>
			 <button>Sortieren nach</button>
			</form>

	<link rel="stylesheet" href="public/app.css"> 
	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>

    <th>ID </th>
	<th>Praeparate Nr. </th>
    <th>Nuklid</th>
    <th>Bezugsdatum</th>
	<th>Anfangs Aktivitaet in Bq</th>


	
 

  
   <?php 
        
        while ($row = mysqli_fetch_assoc($result)){
            $a_null_sc = sprintf("%.2E" ,$row['a_null']);

            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><form action='aktuelle_akt_admin.php' method='post'> <button type='submit' name='preparate_nr' value='".$row['preparate_nr']."' class='btn-link'>" . $row['preparate_nr'] . "</button>
		</form></td>";
            echo "<td><form action='nuklid_admin.php' method='POST'> <button type='submit' name='nuklid' value='".$row['nuklide_art']."' class='btn-link'>" . $row['nuklide_art'] . "</button>
		</form></td>";
            echo "<td>" . $row['bezugsdatum'] . "</td>";
            echo "<td>" .$a_null_sc . "</td>";
            echo "</tr>";

        };
       
    }else{
        header('Location: falsche_eingabe.php?error');
    };


   ?>


</table>
		 <form method="POST" action='add.php'>
			 <button type="submit" >Neues Praeparat hinzufuegen</button>
			</form>	
	 </div>
	</div>

	</div>








</body>
</html>

