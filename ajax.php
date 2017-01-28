<?php
require "config.php";
switch($_POST["option"]){
    case "get_detail_post":
        if($_POST["id"]){
            $sql = "SELECT * FROM `mst_post` where postid = ".$_POST["id"];
            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_object()){
                    $row->pagetext = $bbcode->toHtml($row->pagetext);
                    header('Content-Type: application/json');
                    echo json_encode($row);
                    die;
                }
            }
        }
        break;
    case "get_detail_forum":
        if($_POST["id"]){
            $sql = "SELECT * FROM `mst_thread` where forumid = ".$_POST["id"];
            if ($result = $mysqli->query($sql)) {
                $rows = array();
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                header('Content-Type: application/json');
                echo json_encode($rows);
                die;
            }
        }
        break;
}


