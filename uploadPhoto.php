<?php

include_once "connection.php";
    session_start();
    $posterId =  $_SESSION["Id"];

    // echo $poster_id;
    
    $images = $_FILES["fileToUpload"]['name'];
    $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // echo ($images);
    $title = $_POST["title"];
    $desciption = $_POST["desciption"];
    $participantId = $_POST["participantId"];
    $price= $_POST["price"];
    
    // $sql = "INSERT INTO photostable (`title`, `desciption`, `source`,`participantId`, `price`) VALUES ('$title', '$desciption','$images' , $posterId, $price)";


    $file=$_FILES['fileToUpload']['tmp_name'];
	list($width,$height)=getimagesize($file);
	$nwidth=$width;
	$nheight=$height;
	$newimage=imagecreatetruecolor($nwidth,$nheight);
	if($_FILES['fileToUpload']['type']=='image/jpeg')
	{
		$source=imagecreatefromjpeg($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.jpg';
		$stamp=imagecreatefromjpeg('stamp.jpg');
		
		imagecopy($newimage,$stamp,0,0,0,0,93,67);
		imagejpeg($newimage,'upload/'.$file_name);
	
	}elseif($_FILES['fileToUpload']['type']=='image/png'){
		$source=imagecreatefrompng($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.png';
		$stamp=imagecreatefromjpeg('stamp.jpg');
		imagecopy($newimage,$stamp,0,0,0,0,93,67);
		imagepng($newimage,'upload/'.$file_name);
	}elseif($_FILES['fileToUpload']['type']=='image/gif'){
		$source=imagecreatefromgif($file);
		imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
		$file_name=time().'.gif';
		$stamp=imagecreatefromjpeg('stamp.jpg');
		imagecopy($newimage,$stamp,0,0,0,0,93,67);
		imagegif($newimage,'upload/'.$file_name);
	}
    $sql = "INSERT INTO photostable (`title`, `desciption`, `source`, `source_2`,`participantId`, `price`) VALUES ('$title', '$desciption','$images', '$file_name' , $posterId, $price)";
    $res = $connection->query($sql);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/".$_FILES["fileToUpload"]["name"]);

    
    if($res)
    {
    
        echo "<script> alert(' Photo Uploaded');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';       

    }
    else 
    {
        echo "<script> alert(' Photo Not Uploaded');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';       
    }

?>