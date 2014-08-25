<?php

function connect()
{
    mysqli_report(MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli('localhost', 'root', '', 'test_project');
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error)
        throw new Exception("Connect failed: %s", $mysqli->connect_error);
    else
        return $mysqli;
}





//function stmt_execute($stmt)
//{
//    if ($stmt->execute() === FALSE)
//        return 0;
//    else
//        return 1;
////    try {
////        $stmt->execute();
////        return 1;
////    } catch (mysqli_sql_exception $e) {
////        return 0;
////    }
//}

?>

