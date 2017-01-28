<?php 

$servername = "localhost";
$username = "root";
$password = "";
$mysqli = new mysqli("localhost", "root", "", "tttt4r");
$mysqli->set_charset("latin1");

if($_POST["id"]){
    $sql = "SELECT * FROM `mst_post` where postid = ".$_POST["id"]." ";
    if ($result = $mysqli->query($sql)) {
        while ($row = $result->fetch_object()){
            echo json_encode($row);
            die;
        }
    }
 
}

