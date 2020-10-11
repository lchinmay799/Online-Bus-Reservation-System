<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="applystyles.css">
</head>
<body style="background-image: url('bg.jpg')">
<form method="post" action="page6.php">
<?php
$host="localhost";
$username="root";
$password='p@55w06d';
$conn = mysqli_connect($host, $username, $password,"busreservationsystem")or die("cannot connect");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$pass=array();
$tick=array();
$arr=explode(" ",$_POST['seats']);
foreach($arr as $seatno)
{
	$sql4="UPDATE seats set availibility='no' where seatno = ".$seatno." and bid = ".$_POST['busid'];
	$result4 = $conn->query($sql4);
	$sql="SELECT max(pid) as pid from passenger";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
  		$pid=$row['pid']+1;
  		array_push($pass,$pid);
  	  $sql1 ="INSERT into passenger values(".$pid.",'".$_POST['name']."',".$_POST['age'].",'".$_POST['email']."',".$_POST['busid'].",".$seatno.",".$_POST['mobile'].",'".$_POST['date']."')";
  	$result1 = $conn->query($sql1);
  }
}
  	$sql2="SELECT max(tid) as tid from ticket";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
	  while($row = $result2->fetch_assoc()) {
  		$tid=$row['tid']+1;
  		array_push($tick,$tid); 		
  	  $sql3 ="INSERT into ticket values(".$tid.",".$pid.",".$_POST['busid'].",".$seatno.",'".$_POST['date']."')";
  	$result3 = $conn->query($sql3);
  }
}
}
mysqli_close($conn);
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
font-family: Arial;
font-size: 20px;
padding: 8px;
font-weight: bold;
}
* {
box-sizing: border-box;
}.row {
display: -ms-flexbox; /* IE10 */
display: flex;
-ms-flex-wrap: wrap; /* IE10 */
flex-wrap: wrap;
margin: 0 -16px;
}
.col-25 {
-ms-flex: 25%; /* IE10 */
flex: 25%;
}
.col-50 {
-ms-flex: 50%; /* IE10 */
flex: 50%;
}
.col-75 {
-ms-flex: 75%; /* IE10 */
flex: 75%;
}
.col-25,
.col-50,
.col-75 {
padding: 0 16px;
}
.container {
padding: 5px 20px 15px 20px;
border: 1px solid lightgrey;
border-radius: 3px;
}
input[type=text] {
width: 100%;
margin-bottom: 20px;
padding: 12px;
border: 1px solid #ccc;
border-radius: 3px;
}
label {
margin-bottom: 10px;
display: block;
}
.icon-container {
margin-bottom: 20px;
padding: 7px 0;
font-size: 24px;
}
.btn {

color: white;
padding: 12px;
margin: 10px 0;
border: none;
width: 100%;
border-radius: 3px;cursor: pointer;
font-size: 17px;
}
.btn:hover {
background-color: #45a049;
}
a {
color: #2196F3;
}
hr {
border: 1px solid lightgrey;
}
span.price {
float: right;
color: grey;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on
top of each other instead of next to each other (also change the direction - make the "cart"
column go on top) */
@media (max-width: 800px) {
.row {
flex-direction: column-reverse;
}
.col-25 {
margin-bottom: 20px;
}
}</style>
</head>
<body>
<div class="row">
<div class="col-75">
<div class="container">
<div class="row">
<div class="col-50">
<h3 class='text'>Payment</h3>
<label for="fname" class='text'>Accepted Cards</label>
<img src="cards.png">
<div class="icon-container">
<i class="fa fa-cc-visa" style="color:navy;"></i>
<i class="fa fa-cc-amex" style="color:blue;"></i>
<i class="fa fa-cc-mastercard" style="color:red;"></i>
<i class="fa fa-cc-discover" style="color:orange;"></i>
</div>
<label for="cname" class='text'>Name on Card</label>
<input type="text" id="cname" name="cardname" placeholder="Enter your name">
<label for="ccnum" class='text'>Credit card number</label>
<input
type="text"
id="ccnum"
name="cardnumber"
placeholder="1111-2222-3333-4444">
<label for="expmonth" class='text'>Exp Month</label>
<input type="text" id="expmonth" name="expmonth" placeholder=" ">
<div class="row">
<div class="col-50">
<label for="expyear" class='text'>Exp Year</label>
<input type="text" id="expyear" name="expyear" placeholder="20__">
</div>
<div class="col-50">
<label for="cvv" class='text'>CVV</label>
<input type="text" id="cvv" name="cvv" placeholder="---">
</div>
</div>
</div>
</div>
</label>
</div>
</div>
</div>
<div class="middle">
<a href="page4.php"><input type="button" value="Go Back" class="goback"></a>
<input type="submit" value="Submit" class="submit5">
<input type="hidden" name="date" value="<?php echo $_POST['date']; ?>">
<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
<input type="hidden" name="source" value="<?php echo $_POST['source']; ?>">
<input type="hidden" name="destination" value="<?php echo $_POST['destination']; ?>">
	<?php
	$passid=implode(",",$pass);
	?>
		<?php
	$tickid=implode(",",$tick);
	?>
	<input type="hidden" name="passid" value="<?php echo $passid?>">
	<input type="hidden" name="tickid" value="<?php echo $tickid?>">
<input type="hidden" name="busid" value="<?php echo $_POST['busid']; ?>">
</form>
<a href="page1.html"><input type="button" value="Cancel" class="Cancel5"></a>

</div>
</body>
</html>