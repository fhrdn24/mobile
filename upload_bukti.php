<?php

header("Content-Type: application/json");
header("Content-Type: application/multipart");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");

header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include_once('connection.php');

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
	
$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];
$no_nota = $_POST['no_nota'];

if(empty($fileName))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = 'uploads/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $fileName))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
				move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
			}
			else{	
				http_response_code(400);	
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
	}
	else
	{	
		http_response_code(400);	
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}
		
if(!isset($errorMSG))
{
	http_response_code(201);
	$query = mysqli_query($koneksi, "UPDATE `mjual` SET `bukti_tf`='$fileName', `status`=1 WHERE `no_nota`=$no_nota");
	
	return json_encode([
		'data' => null,
		'meta' => [
			'code' => 201,
			'status' => true,
			'message' => 'Berhasil di Upload',
		],
	]);	
}

?>