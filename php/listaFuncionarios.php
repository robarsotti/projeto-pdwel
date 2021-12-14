<?php

include "db_conn.php";
$sql = "SELECT * FROM TB_FUNCIONARIOS ORDER BY ID_FUNCIONARIO";
$result = mysqli_query($conn, $sql);