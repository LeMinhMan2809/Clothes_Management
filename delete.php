<?php

require_once "connect-select-db.php";
$id = $_POST['id'];
$sql = "DELETE FROM clothes WHERE p_id = $id";

$result = mysqli_query($conn,$sql);

?>