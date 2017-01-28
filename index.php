<?php 
$servername = "localhost";
$username = "root";
$password = "";

$mysqli = new mysqli("localhost", "root", "", "tttt4r");
$mysqli->set_charset("latin1")
 ?>
 <!DOCTYPE html>
 <html lang="">
 	<head>
 		<meta charset="latin1">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<title>Title Page</title>
 
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
$sql = "SELECT * FROM `mst_post` ORDER BY COALESCE(parentid, postid), parentid IS NOT NULL, postid";
$sql = "SELECT * FROM `mst_post` where parentid = 0 ";
if ($result = $mysqli->query($sql)) {
    $i = 1;
    while ($row = $result->fetch_object()){
    	echo $i.": ";
    	echo $row->postid;
    	echo "<br>";
        echo $row->title;
        echo "<br>";
        echo $row->parentid;
        echo "<br>";
        ?>
        <button type="button" class="btn btn-info view-content" data-id="<?= $row->postid ?>" >button</button>
        <?php
        echo "<hr>";
        $i++;
    }
    /* free result set */
    $result->close();
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
  			$(".view-content").click(function(){
  				var id_post = $(this).data("id");
  				$.post('/ajax.php', {id: id_post}, function(data, textStatus, xhr) {
  					console.log($.parseJSON(data) );
  					$(".modal-body").html($.parseJSON(data).pagetext);
  					$("#modal-id").modal();
  				});
  				
  				//alert($(this).data("id"));
  			})
  		</script>
 	</body>
 </html>