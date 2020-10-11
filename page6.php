<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<link rel="stylesheet" type="text/css" href="applystyles.css">
</head>
<body style="background-image: url('bg.jpg')">
<?php
$host="localhost";
$username="root";
$password='p@55w06d';
$conn = mysqli_connect($host, $username, $password,"busreservationsystem")or die("cannot connect");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$arr=array();
$price=0;
$amount=0;
echo "<marquee class='text4'> THANK  YOU ".$_POST['name']." :)</marquee><br><br>";
echo "<marquee class='text5'> HAVE  A  SAFE  JOURNEY ... </marquee><img src='thanks.jpg' class='thanks' width='200' height=''300'>";
$sql = "SELECT name,email,mobileno,age,bid,seatno from passenger where name = '".$_POST['name']."' and jdate = '".$_POST['date']."'and pid in (".$_POST['passid'].")";
$result = $conn->query($sql);
$result1 = $conn->query($sql);
if ($result->num_rows > 0) {
	  	while($row1 = $result1->fetch_assoc()) {
  	    array_push($arr,$row1['seatno']);
    } 
  	$row=$result->fetch_assoc();
  	echo"<br><br><br><br><br><b><br><br><br><br><br>";
  	echo "<p class='text'> Passenger Name: ".$row['name']."</p><p class='date'>Date :".$_POST['date']."</p>";
  	echo "<p class='text'> Age: ".$row['age']."</p>"; 	
  	echo "<p class='text'> Contact Number: ".$row['mobileno']."</p>";
  	echo "<p class='text'> E- Mail: ".$row['email']."</p>";


}

  	$sql2 = "SELECT bname,price,btime,rtime from buses where bid= ".$_POST['busid'];
  	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
    $row2=$result2->fetch_assoc();
    echo "<p class='text'> Bus Name: ".$row2['bname']."</p>";
    echo "<p class='text'> Boarding Point: ".$_POST['source']."</p>";
    echo "<p class='text'> Dropping Point: ".$_POST['destination']."</p>";
    echo "<p class='text'> Time: ".$row2['btime']." to ".$row2['rtime']."</p>"; 
    $amount=$result->num_rows * $row2['price']; 
    echo "<p class='text'> Seat-No: </p>";
    echo "<p class='text'>";
    foreach($arr as $seat)
    { 
      echo $seat." ";
    }
    echo "</p>"; 
    echo "<p class='price1'> Amount: ".$amount." Rs</p>";
}
mysqli_close($conn);
?>
	<a href="page1.html"><input type="button" value="THANK YOU" class="thank"></a>
</body>
</html>