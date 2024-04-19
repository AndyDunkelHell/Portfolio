<?php 
include_once 'includes/dbh.inc.php';

session_start();
if (!empty($_SESSION['pass'])){
    $pass = $_SESSION['pass'];
}else{
    header('Location: login.php?error');
    
    
};

if(isset($_POST['mode'])){
    $mode = $_POST['mode'];
    
}else{
    $mode = 'Admin';  
};


	$sql = "SELECT * FROM users WHERE mode = '$mode';";
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

<form action="edit_pass.php" method="post"> 

			<label for="mode"></label>
  			<select name="mode" id="mode">
      			<option value="Admin">Admin Pass Aendern</option>
      			<option value="Guest">Guest Pass Aendern</option>
	
			</select>
			 <button>Go!</button>
			</form>
<body>


	<link rel="stylesheet" href="public/app1.css"> 
	
<table border="1" cellpadding="7" cellspacing="7">
  <tr>

    <th>Mode </th>
	<th>Passwort </th>
 


	
 

  
   <?php 
        
        while ($row = mysqli_fetch_assoc($result)){
            

            echo "<tr>";
            echo "<td>" . $row['mode'] . "</td>";
            echo "<td>" . $row['pass'] . "</td>";
            
        
        
  
        };
       
    }else{
        header('Location: index.php?error');
    };


   ?>


</table>
		 <form method="POST" action='neu_pass.php'>
             <input type='text' name='neu_pass' class="form" placeholder= " <?php echo $row['pass']; ?> " required />
			 <button type="submit" onclick="return confirm('Passwort Aendern?');">Passwort Aendern!</button>
			</form>	
	 </div>
	</div>

	</div>








</body>
</html>

