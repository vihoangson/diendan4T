<?php
require "config.php";
$sql = "SELECT * FROM `mst_forum` where forumid in (2,161,162,55,46,158,159,160,164,75,157,176,77,169,81,84,96,143,145,141,152,151,177)
order by forumid 
";
if ($result = $mysqli->query($sql)) {
	$forums = [];
	while ($row = $result->fetch_object()){
		$forums[] = $row;
	}
}

 ?>
 <!DOCTYPE html>
 <html lang="">
 	<head>
 		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<title>Diễn đàn 4T</title>
		<link rel="stylesheet" href="includes/style.css">
 		<!-- Bootstrap CSS -->
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 
 		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
 			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 		<![endif]-->
 	</head>
 	<body>
 	<div class="container">
 <?php
	foreach ($forums as $key => $value){
 		echo "
	<div class='forum-contain'>
		<h3 class='view-forum' data-id='$value->forumid'> $value->title</h3>
		<div class='content-forum'></div>
	</div>
";
	}
 ?>
</div>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
 		<!-- jQuery -->
 		<script src="//code.jquery.com/jquery.js"></script>
 		<!-- Bootstrap JavaScript -->
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  		<script>

  			$(document).on("click",".view-content",function(){
  				var id_post = $(this).attr("id");
  				$.post('/ajax.php', {option:'get_detail_post',id: id_post}, function(data, textStatus, xhr) {
					var ele_append = $("<div class=''><auth></auth><content></content></div>");
					ele_append.children("content").html(data.pagetext);
					ele_append.children("auth").html(data.postusername);
  					$(".modal-body").html(ele_append);
					$("#modal-id").modal();

  				});
  			});

			$(".view-forum").click(function(){
				var this_selector = $(this);
				var id_post = $(this).data("id");
				var content_forum = this_selector.parent().find(".content-forum");
				if(content_forum.html() == ""){
					$.post('/ajax.php', {option:'get_detail_forum',id: id_post}, function(data, textStatus, xhr) {
						$.each(data,function(k,v){
							var ele_append = $("<div class=''>  <content></content> <authen></authen> </div>");
							ele_append.find("authen").html(v.postusername);
							ele_append.find("content").html(v.title);
							ele_append.append("<time>"+v.dateline+"</time>");
							ele_append.addClass("view-content");
							ele_append.attr("id",v.firstpostid);
							content_forum.append(ele_append);
						});
					});

				}else{
					content_forum.toggle();
				}
			});

  		</script>
 	</body>
 </html>