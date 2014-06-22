<?php

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif', 'jpeg');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

    $prefix_name = $_POST["upload_inner_img_name_prefix"];
    $file_name = $prefix_name."_".$_FILES['upl']['name'];

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'public/uploads/'.$file_name)){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;