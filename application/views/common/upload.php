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
        //////////////////
        $filename = 'public/uploads/'.$file_name;
        $percent = 0.5;

        header('Content-Type: image/jpeg');

        list($width, $height) = getimagesize($filename);
        $new_width = $width * $percent;
        $new_height = $height * $percent;

        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($image_p, $filename, 100);
        //////////////////
		exit;
	}
}

echo '{"status":"error"}';
exit;