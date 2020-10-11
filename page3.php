<!DOCTYPE html>
<html>
<head>
	<title>Seats</title>
	<link rel="stylesheet" type="text/css" href="applystyles.css">
</head>
<body style="background-image: url('bg.jpg')">
<form method="post" action="page4.php">
<?php
$host="localhost";
$username="root";
$password='p@55w06d';
$conn = mysqli_connect($host, $username, $password,"busreservationsystem")or die("cannot connect");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<marquee class='text1'>".$_POST['busname']." </marquee>";
$arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36);
$arr2=array();

$sql2 = "SELECT bid from buses where bname = '".$_POST['busname']."'";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	$bus=$row['bid'];
  }
}
$sql = "SELECT seatno from seats where bid = $bus and availibility = 'yes'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	array_push($arr2,$row['seatno']);
  }
foreach ($arr as $value)
{
	if(in_array($value, $arr2))
	{
		echo "<label><input type='checkbox' name=seats[] class='seat$value' value=".$value."><p class='seat$value'>".$value."</p></input></label><br><br>";
	}
	else
	{
		echo "<p name=seats[] class='seat$value' id='booked'>".$value."</p><br><br>";
	}
}
}
mysqli_close($conn);
?>
<input type="hidden" name="source" value="<?php echo $_POST['source']; ?>">
<input type="hidden" name="destination" value="<?php echo $_POST['destination']; ?>">
<input type="hidden" name="busid" value="<?php echo $bus; ?>">
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
<input type="submit" value="Submit" class="submit3">
</form>
<a href="page1.html"><input type="button" value="Cancel" class="Cancel3"></a>
</body>
</html>