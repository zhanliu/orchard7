<?php

// A list of permitted file extensions
$allowed = array('JPG', 'jpg', 'jpeg');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

    $prefix_name = $_POST["upload_inner_img_name_prefix"];

    if (isset($_POST['fixed_upload_img_name'])) {
        $file_name = $_POST['fixed_upload_img_name'];
    } else {
        $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($extension), $allowed)){
            echo '{"status":"error"}';
            exit;
        }

        $file_name = $prefix_name."_".$_FILES['upl']['name'];
    }


	if (ONLINE == 'FALSE') { // offline

        // save 100*100 product image
		if(move_uploaded_file($_FILES['upl']['tmp_name'], 'public/uploads/'.$file_name)){
            copy('public/uploads/'.$file_name, 'public/uploads/'.'b_'.$file_name);
			echo '{"status":"success"}';

			$filename = 'public/uploads/'.$file_name;
			//$percent = 2/3;////////////// file compress
			header('Content-Type: image/jpeg');
			list($width, $height) = getimagesize($filename);
			$new_width = $width * 2 / 3;
			$new_height = $height * 2 / 3;
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($image_p, $filename, 100);
			
		//	exit;
		} else{
			echo "There was an error uploading the file, please try again!";
		}

        // save 150*150 product image
        $file_name = 'b_' .$file_name;
        //if(move_uploaded_file($_FILES['upl']['tmp_name'], 'public/uploads/'.$file_name)){

        //    echo '{"status":"success"}';

            $filename = 'public/uploads/'.$file_name;
            //$percent = 2/3;////////////// file compress
            header('Content-Type: image/jpeg');
            list($width, $height) = getimagesize($filename);
            $new_width = $width;
            $new_height = $height;
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($filename);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_p, $filename, 100);

        //    exit;
        //} else{
        //    echo "There was an error uploading the file, please try again!";
        //}
		
	} else { // online
		$target_path = SAE_TMP_PATH;
		$basename=basename( $_FILES['upl']['name']);
		$domain='product';
		//$uuid=md5(uniqid(rand(), true));
		$target_path = $target_path.$prefix_name;

        // save 100*100 image
		if(move_uploaded_file($_FILES['upl']['tmp_name'], $target_path)) {
			//$percent = 2/3;////////////// file compress
			header('Content-Type: image/jpeg');
			list($width, $height) = getimagesize($target_path);
			$new_width = $width * 2 / 3;
			$new_height = $height * 2 / 3;
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($target_path);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($image_p, $target_path, 100);
			
			
			$file_contents= file_get_contents($target_path);
			$s = new SaeStorage();
			$filename = $file_name;
			$s->write($domain, $filename ,$file_contents);
			$url=$s->getUrl($domain, $filename );
			
			exit;
		} else{
			echo "There was an error uploading the file, please try again!";
		}

        // save 150 * 150 image
        $prefix_name = 'b_' . $prefix_name;
        $target_path = SAE_TMP_PATH.$prefix_name;
        $file_name = 'b_' . $file_name;
        if(move_uploaded_file($_FILES['upl']['tmp_name'], $target_path)) {
            //$percent = 2/3;////////////// file compress
            header('Content-Type: image/jpeg');
            list($width, $height) = getimagesize($target_path);
            $new_width = $width;
            $new_height = $height;
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $image = imagecreatefromjpeg($target_path);
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_p, $target_path, 100);


            $file_contents= file_get_contents($target_path);
            $s = new SaeStorage();
            $filename = $file_name;
            $s->write($domain, $filename ,$file_contents);
            $url=$s->getUrl($domain, $filename );

            exit;
        } else{
            echo "There was an error uploading the file, please try again!";
        }
	}
}

echo '{"status":"error"}';
exit;