<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class dataBase
{
    public static function connection()
    {
        $host = 'localhost';
        $dbname = 'proj_loja';
        $user = 'root';
        $pass = '';
        $port = 3306;
        $connect = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);
        return $connect;
    }
    public static function execSQL($sql)
    {
        $connect = database::connection();
        $statement = $connect->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll((PDO::FETCH_ASSOC));
        $result = json_encode($result);
        echo $result;
        return $result;
    }


}



?>