<?php

function connect()
{
    ini_set('default_charset', 'utf-8');
    mysqli_report(MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli('localhost', 'root', '', 'test_project');
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

