<?php
    

    function getCon(){
        $hostname = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'tintuc';

        try{
            $conn = mysqli_connect($hostname, $user, $pass, $dbname);
            echo 'ket noi ok';
            return $conn;
        }
        catch(mysqli_sql_exception){
            return null;
        }
    }

    function checkUser($user, $pass){
        $conn = getCon();
        $query = "SELECT * FROM users";

        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) >0 ){
            while($row = mysqli_fetch_assoc($result)){
                $duser = $row['username'];   // database user
                $dpass = $row['password'];   // database pass
                if($duser == $user && $dpass == $pass){
                    return true;
                    break;
                }
            }
        }
        return false;
    }
?>