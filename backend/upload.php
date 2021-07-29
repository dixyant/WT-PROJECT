<?php require_once "connection.php"?>
 <?php
 session_start();
 if(isset($_POST["submit"])){
 	//getting the details of the files that is uploaded
 	$file=$_FILES['file'];
 	var_dump($_FILES);
 	$f_name=$_FILES['file']['name'];
 	$f_temp=$_FILES['file']['tmp_name'];
 	$f_error=$_FILES['file']['error'];
 	$f_size=$_FILES['file']['size'];
 	$f_type=$_FILES['file']['type'];
    $f_newname="";
 	//getting the title heading
     $title= $_POST["title"]; 


	 //getting the extension of file that is uploaded
	 //explode separate the string into parts from given point and store it in array
	 $f_sep=explode('.',$f_name);

	 //end(arr) gives the value of last index of the array 
	 //strlower() lowers the sting case
	 $f_ext=strtolower(end($f_sep));

	 //determining which extension is allowed
	  $allowed=array('png','jpeg','jpg');








	 //in_array(value,arr) function checks the given value in the given arr
	 if(in_array($f_ext,$allowed)){
	  	if($f_error===0){
	  		if($f_size<100000000){
	  			$f_newname=uniqid('',true).".".$f_ext;
	  			$f_destination='../uploads/'.$f_newname;
	            move_uploaded_file($f_temp,$f_destination);
	            $sql="INSERT INTO images(image) VALUES(?)";
				$stmt=$con->prepare($sql);
				$stmt->bind_param('s',$f_newname);
				$stmt->execute();
				$_SESSION["verified"]=FALSE;
				header("Location:../fonts/image_gallery.php");
                echo("here");
	  		}
	  		else{
	          echo("yout file is too big");
	  		}
	  	}
	  	else{
	  		echo "Error uploading your file";
	  	}

	 }
	  else{
	  	echo("This type of file is not allowed");
	  }
	//uploading file in datbase matching with title
	 // header("Location:../fronts/resource.php");
	}
	else{
		echo "cannot be connected";
		var_dump($_POST);
	}