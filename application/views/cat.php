<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("layout/header");
    foreach ($data as $key => $value){
        echo "
		<div class='forum-contain'>
			<h3 class='view-forum' data-id='$value->threadid'> 
			    <a href='/diendan/detail/$value->threadid-".createSlug($value->title)."'>
			        $value->title    
                </a>
			</h3>
			<div class='content-forum'></div>
		</div>
		";
    }
$this->load->view("layout/footer");