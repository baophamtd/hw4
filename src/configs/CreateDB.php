<?php

namespace threemuskateers\hw4\configs;


require_once "Config.php";

//Establish connection to database
$conn = mysqli_connect(DEFHOST,"root", "");

//Check connection was successful
if($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error . "\n";
}
//Create the database
$sql = "CREATE DATABASE " . DB;
if($conn->query($sql) === TRUE) {
    echo "Database " . DB . " created successfully \n";
} else {
}

$conn->select_db(DB);





//Create a new table for genres with genre and # of stories
$sql = "CREATE TABLE CHARTDATA(
    md5 VARCHAR(100) PRIMARY KEY NOT NULL,
    title VARCHAR(100),
    data VARCHAR(80))"; 
if ($conn->query($sql) === TRUE) {
} else {

}

$conn->close();


?>


