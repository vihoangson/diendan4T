
<?php

class Diendan_model extends CI_Model{
    public function get_forum(){
        $sql = "SELECT * FROM `mst_forum` where forumid in (2,161,162,55,46,158,159,160,164,75,157,176,77,169,81,84,96,143,145,141,152,151,177)
        order by forumid
        ";
        return $this->db->query($sql)->result();
    }

}