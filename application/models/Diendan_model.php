<?php

/**
 * Class Diendan_model
 * @property   $Diendan_model Diendan_model
 */
class Diendan_model extends CI_Model{
    public function get_forum(){
        $sql = "SELECT * FROM `mst_forum` where forumid in (2,161,162,55,46,158,159,160,164,75,157,176,77,169,81,84,96,143,145,141,152,151,177)
        order by forumid
        ";
        return $this->db->query($sql)->result();
    }

    public function get_thread_by_forumid($forumid)
    {
        $sql = "SELECT * FROM `mst_thread` where forumid= $forumid ";
        return $this->db->query($sql)->result();
    }

    public function get_detail_thread($threadid)
    {
        $sql = "SELECT * FROM `mst_thread` inner join `mst_post` on `mst_thread`.firstpostid = `mst_post`.postid  where `mst_thread`.threadid= $threadid ";
        return $this->db->query($sql)->row();
    }
}