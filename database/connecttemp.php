<?php
    const _DBname = 'trangsuc';
    const _User = 'root';
    const _Pw ='';
    const _Host = 'localhost';
    try {
        $dsn = 'mysql:dbname=' . _DBname . ';host=' . _Host;
        $db = new PDO($dsn, _User, _Pw);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $message = "Successed!";
        // echo($message);
    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = "Failed!";
        die();
    }
?>