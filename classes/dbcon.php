<?php

class DBCon{
	var $host = "localhost";
	var $pass = "";
	var $db = "moe";
	var $user = "root";
	var $myconn;

	function connection(){
		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        
        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            //echo 'Connection established!';
        }

        return $this->myconn;
    }

    function close() {
        mysqli_close($myconn);
        echo 'Connection closed!';
    }

} 
?>