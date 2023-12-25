<?php
    require_once "connect-select-db.php";
    $select_sql = "SELECT * FROM clothes";
    $select_query = mysqli_query($conn, $select_sql);
    $data = array();
    while($row = mysqli_fetch_assoc($select_query)){
        $data[] = $row;
    }
    echo json_encode($data)
?>