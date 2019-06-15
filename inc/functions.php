<?php
function 	protect($param){
	return (nl2br(addslashes(htmlentities($param))));
}

function 	bdd_connect(){
	$bdd = new mysqli('localhost', 'root', '', 'mahojin');
	if ($bdd->connect_error)
		die("Connection failed: " . $bdd->connect_error);
	return ($bdd);
}

function 	encrypt_filename($filename){
	$filename = substr(sha1($filename).sha1(date("H:i:s")), -5, 10);
	return ($filename);
}

function 	checkfile($filename, $size, $tmp_name){
	if ($size <= 5000000){
	    $infos = pathinfo($filename);
	    $extension_upload = $infos['extension'];
	    $authorized_extensions = array('jpg', 'jpeg', 'gif', 'png');
	    if (in_array($extension_upload, $authorized_extensions)){
			$filename = encrypt_filename($filename).'.png';
	    	move_uploaded_file($tmp_name, 'uploads/' . basename($filename));
	    	return (1);}}
	return (0);
}

function	insert_caption($username, $category, $title, $filename, $caption, $private){
	$bdd = bdd_connect();
	$filename = encrypt_filename($filename).'.png';
	if ($private === 1){
		$salt = sha1($filename).sha1(date("Y-m-d H:i:s"));
		$sql = "INSERT INTO `captions` (title, caption, image, date, category, author, salt, private) VALUES ('".$title."', '".$caption."', '".$filename."', '".date("Y-m-d")."', '".$category."', '".$username."', '".$salt."', 1)";
		if (mysqli_query($bdd, $sql)){
			$read = $bdd->query("SELECT * FROM `captions` WHERE salt='".$salt."'");
			$data = $read->fetch_assoc();
			$id = $data['id'];
			header("Location: ?read=$id&key=$salt");}
		else
			echo "Error " . $sql . "<br>" . mysqli_error($bdd);}
	else {
		$sql = "INSERT INTO `captions` (title, caption, image, date, category, author) VALUES ('".$title."', '".$caption."', '".$filename."', '".date("Y-m-d H:i:s")."', '".$category."', '".$username."')";
		if (mysqli_query($bdd, $sql)){
			$read_p = $bdd->query("SELECT * FROM `captions` WHERE title='".$title."' AND caption='".$caption."' AND image='".$filename."' AND author='".$username."'");
			$data = $read_p->fetch_assoc();
			$id = $data['id'];
			header("Location: ?read=$id");
		}
		else
			echo "Error " . $sql . "<br>" . mysqli_error($bdd);}
}
?>