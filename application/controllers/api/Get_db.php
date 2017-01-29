<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH."libraries/REST_Controller.php";

class Get_db extends Restserver\Libraries\REST_Controller {
    /**
     * /api/get_db/get_detail
     */
    public function get_detail_post()
    {
        $this->load->library("Bbcode");
        if($_POST["id"]){
            $sql = "SELECT * FROM `mst_post` where postid = ".$_POST["id"];
            if ($result = $this->db->query($sql)->result()) {
                foreach ($result as $row){
                    $row->pagetext = $this->bbcode->data->toHtml($row->pagetext);
                    $this->response($row);
                }
            }
        }
    }

    /**
     * /api/get_db/get_detail_forum
     */
    public function get_detail_forum_post()
    {
        if($_POST["id"]){
            $sql = "SELECT * FROM `mst_thread` where forumid = ".$_POST["id"]." order by threadid desc";
            if ($result = $this->db->query($sql)->result()) {
                $rows = array();
                foreach ($result as $row){
                    $row->dateline = date("Y-m-d h:i:s",$row->dateline);
                    $rows[] = $row;
                }
                $this->response($rows);
            }
        }
    }

}
