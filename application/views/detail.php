<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("layout/header");
        echo "
		<div class='forum-contain'>
			<h3 class='view-forum' data-id='$data->threadid'> 
			        $data->title			        
			</h3>
			".bbcode_decode($data->pagetext)."
			<div class='content-forum'></div>
		</div>
		";
$this->load->view("layout/footer");
