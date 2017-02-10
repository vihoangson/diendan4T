<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Set title cho trang
 */
if(isset($data[0]->title)){
	$this->load->vars("title",$data[0]->title);
}else{
	$this->load->vars("title","");
}

$this->load->view("layout/header");
foreach ($data as $row){
    echo "
		<div class='detail-contain'>
			<h3 class='view-forum' data-id=''>$row->title</h3>		    
		    <h4>$row->username</h4>
            <div>".date("Y-m-d H:i:s",$row->dateline)."</div>

			".bbcode_decode($row->pagetext)."
			<div class='content-forum'></div>
		</div>
		";
}

$this->load->view("layout/footer");
