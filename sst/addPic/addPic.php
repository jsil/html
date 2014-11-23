<?php
$target_dir = "../../img/";
if(!empty($_POST["newName"])) {
	$_FILES["fileToUpload"]["name"] = $_POST["newName"] . '.' . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if((strcasecmp($imageFileType, "jpg") != 0) && (strcasecmp($imageFileType, "jpeg") != 0) && (strcasecmp($imageFileType, "png") != 0) && (strcasecmp($imageFileType, "gif") != 0) && (strcasecmp($imageFileType, "bmp") != 0)) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "upload error";
} 
else {
	//add file to folder
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	echo "Upload successful of " . basename($_FILES["fileToUpload"]["name"]) . " was successful.
		<br>
		<button onclick=\"location.href='../../'\">Home</button>";
    } 
    else {
        echo "upload error";
    }
}

?>