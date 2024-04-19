<?php
include_once 'includes/dbh.inc.php';
	$funk = $_POST['funk'];
    echo $funk;
    if ($funk == 0){
        header ('Location: add_nuklid.php');
    };
    if ($funk == 1){
        header ('Location: preparat_tabelle_all.php');
    };
    if ($funk == 2){
        header ('Location: preparat_tabelle_null.php');
    };

    if ($funk == 3){
        header ('Location: edit_pass.php');
    };


?>

