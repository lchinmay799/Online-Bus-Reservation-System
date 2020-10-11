<!DOCTYPE html>
<html>
<head>
	<title>Buses</title>
	<link rel="stylesheet" type="text/css" href="applystyles.css">
</head>
<body style="background-image: url('bg.jpg')">
<div class="middle1">
<form method="post" action="page3.php">
<?php
$host="localhost";
$username="root";
$password='p@55w06d';
$conn = mysqli_connect($host, $username, $password,"busreservationsystem")or die("cannot connect");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<marquee class='text1'>".$_POST['source']."  To  ".$_POST['destination']."</marquee>";
$sql1="SELECT id from places where name = '".$_POST['source']."'";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		$board=$row['id'];
	}
}
$sql2="SELECT id from places where name = '".$_POST['destination']."'";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		$drop=$row['id'];
	}
}
  	echo "<div class='middle'>";
$sql = "SELECT bname,btime,rtime,name,price from buses,companies where boardingid=$board and destinationid=$drop and cid=id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	echo "<label class='text3'><input type='radio' name='busname' value= '".$row['bname']."'>". $row['bname']."<br><br>".$row['name']."<br><br>".$row['btime']." to ".$row['rtime']."<p class='price'>".$row['price']."  Rs</p></input></label><br><br><br><br><br>";
  }
}
echo "</div>";
mysqli_close($conn);
?>
<input type="hidden" name="source" value="<?php echo $_POST['source']; ?>">
<input type="hidden" name="destination" value="<?php echo $_POST['destination']; ?>">
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
<input type="submit" value="Submit" class="submit2">
</form>
<a href="page1.html"><input type="button" value="Cancel" class="Cancel2"></a>
</div>
</body>
</html>