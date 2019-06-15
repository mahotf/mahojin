<?php
include('inc/functions.php');
if (isset($_POST['submit'])){
	$_POST['username'] = protect($_POST['username']);
	$_POST['title'] = protect($_POST['title']);
	$_POST['caption'] = protect($_POST['caption']);
	if (checkfile($_FILES['myFile']['name'], $_FILES['myFile']['size'], $_FILES['myFile']['tmp_name'])){
		if (strlen($_POST['caption']) >= 250 AND strlen($_POST['username']) >= 3 AND strlen($_POST['title']) >= 2){
			if (!isset($_POST['private']))
				$private = 0;
			else
				$private = 1;
			insert_caption($_POST['username'], $_POST['category'], $_POST['title'], $_FILES['myFile']['name'], $_POST['caption'], $private);}
		else
			$error = "Please respect the size of the field";}
	else
		$error = "Wrong format of file. Please upload a jpg, jpeg, gif or png file. Max size = 5 Mo";}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<title>Maho Captions</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>
<body>


	<div class="container-cap100" style="background-image: url('images/bg-01.jpg');">
		<?php
			if (isset($_GET['read'])){
				$bdd = bdd_connect();
				$request = $bdd->query("SELECT * FROM captions WHERE id = '".$_GET['read']."'");
				$content_caption = $request->fetch_assoc();
				if (!isset($content_caption))
					include('inc/wrong_id.php');
				else{
					if ($content_caption['private'] == 1 AND (isset($_GET['key']) AND $_GET['key'] === $content_caption['salt']))
						include('inc/read.php');
					else if ($content_caption['private'] == 1 AND (isset($_GET['key']) AND $_GET['key'] != $content_caption['salt']))
						include('inc/private.php');
					else if ($content_caption['private'] == 1 AND (!isset($_GET['key'])))
						include('inc/private.php');
					else
						include('inc/read.php');}}
			if (isset($_GET['create']))
				include('inc/form.php');
		?>
	</div>

	<div id="dropDownSelect1">Website created by MahoTF</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
		<script src="js/custom-file-input.js"></script>
	<script src="js/main.js"></script>
</body>
</html>