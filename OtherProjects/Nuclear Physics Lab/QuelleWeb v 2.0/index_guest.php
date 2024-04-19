

<!DOCTYPE html>

<head>
    <title>Home</title>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
<link rel="stylesheet" href="public/app1.css">




<div class="flex-container">
	<form method="GET" action='login.php'>
			 <button>Logout</button>
			</form>
	<h1>Radioaktive Quellen</h1>
	<div class="container">


			<li class="lead">Bitte <strong>Nuklid</strong> eingeben (Bsp. Am-241, Th-232...) </li>
			<form method="POST" action='nuklid.php'>
			 <input type="text" class="form" name="nuklid" placeholder="Nuklid" required/> <button type="submit" name="sort" value="id">Nuklid Info</button>

			</form>

			<li class="lead">Bitte <strong>Präparate Nr.</strong> eingeben </li>
			<form method="POST" action='aktuelle_akt.php'>
			<input type="text" class="form" name="preparate_nr" placeholder="Praeparat" required/ >
			 <button>Praeparat anzeigen!</button>
			</form>

			<li class="lead">Bitte <strong>Zerfalls-Art</strong> wählen:</li>

		<form method="POST" action='strahlungs_art.php'>
			<label for="typ"></label>
  			<select name="typ" id="typ">
      			<option value="Neutron">Neutron</option>
      			<option value="Alpha">Alpha</option>
				<option value="Beta Minus">Beta Minus</option>
      			<option value="Beta Plus">Beta Plus</option>
				<option value="Epsylon">Epsylon</option>
			</select>
			 <button>Nach Strahlungsart suchen</button>
			</form>


			<li class="lead"><strong>Quelle Liste anshen</strong></li>
			<form method="POST" action='quelleliste.php'>
			 <button  type="submit" name="sort" value="id" >Zeigen!</button>
			</form>


 	</div>
</div>









</body>
</html>