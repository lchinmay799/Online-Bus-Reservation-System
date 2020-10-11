<!DOCTYPE html>
<html>
<head>
	<title>Information</title>
	<link rel="stylesheet" type="text/css" href="applystyles.css">
</head>
<body style="background-image: url('bg.jpg')">
<div class="middle4">
<form method="post" action="page5.php">
<label class='text'>Name :</label>
	<input type="text" class='size1' name="name" placeholder="Enter your name...."><br><br><br><br>
	<label class='text'>Age :</label>
	<input type="number" class='size1' name="age" placeholder="Enter your age...."><br><br><br><br>
	<label class='text'>E-Mail :</label>
	<input type="email" class='size1' name="email" placeholder="abcd@xyz.com"><br><br><br><br>
	<label class='text'>Mobile-No: </label>
	<input type="tel" class='size1' name="mobile" placeholder="Enter your Contact Number...."><br><br><br><br>
	<input type="hidden" name="source" value="<?php echo $_POST['source']; ?>">
	<input type="hidden" name="destination" value="<?php echo $_POST['destination']; ?>">
	<input type="hidden" name="busid" value="<?php echo $_POST['busid']; ?>">
	<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
	<?php
	$seats=implode(" ",$_POST['seats']);
	?>
	<input type="hidden" name="seats" value="<?php echo $seats?>">
	<input type="submit" value="Submit" class="submit4">
</form>
<a href="page4.php"><input type="button" value="Go Back" class="goback4"></a>
	<a href="page1.html"><input type="button" value="Cancel" class="Cancel4"></a>
</div>
</body>
</html>