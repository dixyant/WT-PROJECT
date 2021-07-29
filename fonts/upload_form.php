<?php
session_start();
if($_SESSION["verified"]){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color:red;
			font-family: 'Roboto Condensed', sans-serif;
   			 margin: 0;
    		background: #eee;
    		height: auto;
		}
		body>*{
			color:white;
		}
		input>*{
			border:none;

		}
		form{
			display:flex;
			justify-content:space-between center;
			align-items: center;
			flex-direction:column;
		}
		form>*{
			margin:3px;
		}
		input[type="submit"],button{
			padding: 0.5rem 2rem;
   			border: 1px #ccc solid;
    		display: inline-block;
    		margin: 2rem 0 0;
    		border-radius: 50px;
    		text-decoration: none;
    		color: #333;
    		transition: background 500ms ease;
		}
		h1{
			text-align:center;
			color: black;

		}
		input[name="title"]{
			border-radius:5px;
			line-height:40px;
			font:bold;
			font-size:20px;
			border:none;
			min-width:400px;
		}
		input:focus{
			outline:none;
		}
		#fileName{
			background-color:black;
			padding:5px;
			border-radius:5px;
			border-radius:5px;
			line-height:40px;
			font:bold;
			font-size:20px;
			border:none;
			min-width:400px;
		}
		body {
    		max-width: 900px;
    		margin: auto;
    		box-shadow: 30px 0px 40px rgb(0 0 0 / 10%), -30px 0px 40px rgb(0 0 0 / 10%);
			}
		#rlInput{
			color:black;
		}
	</style>


</head>
<body>
	<h1>Upload Images to your website </h1>
	<div id="formBox">
		<form action="../backend/upload.php" method="POST" enctype="multipart/form-data">
			<!-- <label for="title">Resource Title</label> -->
			<br>
			<input type="text" name="title" placeholder="Image Title ....">
			<br>
			<input id="rlInput"type="file" name="file">
			<input type="submit" name="submit" value="submit">
		</form>
	</div>
</body>
<?php
}
else{
   echo "<a href=admin.html>You need to login as admin</a>" ;
}
?>