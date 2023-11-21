<? 
const _DBname = 'trangsuc';
const _User = 'root';
const _Pw ='';
const _Host = 'localhost';
try{
    $dsn = 'mysql:dbname'._DBname.';host='._Host;
    $conn = new PDO($dsn,_User,_Pw);
}catch(Error $e){
    echo $e->getMessage();
    die();
}
?>