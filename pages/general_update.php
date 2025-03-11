<?php 
extract($_POST);
$con = new mysqli('localhost', 'root', '', 'mdrsystem');
echo $sql = "UPDATE $table SET `$column`='$value' WHERE `$condition`='$identifier'";
$query = $con->query($sql);

if ($query) {
	echo "1";
}else{
	echo "0";
}

 ?>