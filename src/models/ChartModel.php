<?php

namespace threemuskateers\hw4\models;

require_once "Model.php";

class ChartModel extends Model {

    private $conn;
    /**
     * Constructor for UserModel is used to instanciate 
     * a connection to mysql
     */
    public function __construct() {
        $this->conn = $this->connectToDB();
    }
	
	public function getChartData($md5){
        $sql = "SELECT title, data FROM CHARTDATA WHERE md5='$md5'";
        $result = mysqli_query($this->conn,$sql);
        $row = $result->fetch_assoc();

        return $row;
      
    }
    
    public function saveChartData($md5, $title, $data){
        $sql = "INSERT INTO CHARTDATA VALUES ('$md5','$title', '$data');"; 
        $this->conn->query($sql);
    }
	


}


?>


