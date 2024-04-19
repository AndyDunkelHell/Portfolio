<?php 
	include_once 'includes/dbh.inc.php';
	session_start();

   
    if (!empty($_SESSION['pass'])){
        $pass = $_SESSION['pass'];
    }else{
        header('Location: login.php?error');
        
        
    };

	$art = mysqli_real_escape_string($conn,$_POST['nuklid']);
	
	if (isset($_POST['sort'])){
        $sort = mysqli_real_escape_string($conn, $_POST['sort']);
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
	
	$url = $_SESSION['redirectURL'];
	
	$sql = "SELECT * FROM nuklide  JOIN preparate  ON nuklide.art = preparate.nuklide_art WHERE art = '$art' ORDER BY $sort;";	
	$sql_first = "SELECT * FROM nuklide JOIN backgrounds ON nuklide.art = backgrounds.background_art WHERE art = '$art';";
    $result = mysqli_query($conn, $sql);
	$first_res = mysqli_query($conn, $sql_first);
    $result_check = mysqli_num_rows($result);
	$result_check_first = mysqli_num_rows($first_res);
    if ($result_check > 0){
		$first = mysqli_fetch_assoc($first_res);
		
		 if($url == '/aktuelle_akt.php'){
            
            $post = $_SESSION['preparate_nr'];
            $name = 'preparate_nr';
            
        }elseif($url == '/quelleliste.php'){
            
            $post = 'id';
            $name = 'sort';
          
        }elseif($url == '/strahlungs_art.php'){
            $post = $_SESSION['typ'];
            $name = 'typ';
            
            
        }elseif($url == '/nuklid.php'){
            $post = $_POST['nuklid'];
            $name = 'nuklid';
            
            
        }else{
            //Back Button
            $post = $pass;
            $name = 'pass';
            $_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];
        };


?>

<!DOCTYPE html>
<head>
    <title>Nuklid Art</title>
</head>
<body>


	<link rel="stylesheet" href="public/app_nuklid.css"> 
	<div class="flex">
<form method="POST" action='index.php'> <button type="submit" name = "pass" value = "<?php echo $pass; ?>" class="flex-child">Home</button> </form>	

<form method="POST" action='<?php echo $url; ?>'> <button type="submit" name = "<?php echo $name;  ?>" value = "<?php echo $post; ?>" class="flex-child">Back</button> </form>

<form method="POST" action='quelleliste.php'> <button type="submit" name = "sort" value = "id" class="flex-child">Quelleliste</button> </form>


</div>
	
<div class="row" >
  <div class="column">
	  <div class="crop">
	  <img src = "<?php echo $first['link']; ?>" alt = "Bild nicht vorhanden" >
	  </div>
	</div>
 <div class="row" >

	


	 <div class="column">
	  <li class="lead"> Zerfalls-Art: <?php echo $first['strahlungsart']; ?> </li>
		<li class="lead"> Prozent (+/-): <?php echo $first['prozent']; ?> </li>
		<li class="lead"> Z= <?php echo $first['z']; ?></li>
		<li class="lead"> N= <?php echo $first['n']; ?></li>
		<form action="nuklid.php" method="post"> 

			<label for="sort"></label>
  			<select name="sort" id="sort">
      			<option value="<?php echo $value1; ?>"><?php echo $option1; ?></option>
      			<option value="<?php echo $value2; ?>"><?php echo $option2; ?></option>
				<option value="<?php echo $value3; ?>"><?php echo $option3; ?> </option>
	
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
	 $_SESSION['redirectURL']=$_SERVER['REQUEST_URI'];

	?>


</table>
		 
	 </div>
	</div>

	</div>








</body>
</html>

