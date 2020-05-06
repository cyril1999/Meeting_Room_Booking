<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

$email=$_SESSION["id"];
$data='';

//$sql="SELECT book_id,booking_date,room_id FROM bookings WHERE user_id='$email'";
//$sql="select bookings.booking_date, slots.start_time,rooms.rarea,rooms.rcity,rooms.pic_location,accounts.Name from bookings,slots,rooms,accounts where slots.slot_id=bookings.slot_id and rooms.room_id=bookings.room_id and accounts.Email=bookings.user_id and bookings.user_id='$email'";

$sql="select bookings.booking_date, slots.start_time,rooms.rarea,rooms.rcity,rooms.pic_location,accounts.Name from bookings,slots,rooms,accounts where slots.slot_id=bookings.slot_id and rooms.room_id=bookings.room_id and accounts.Email=bookings.user_id and bookings.user_id='$email' and booking_date>=CURDATE()";

/*if($stmt=mysqli_prepare($link,$sql))
{
	if(mysqli_stmt_execute($stmt))
	{
		mysqli_stmt_store_result($stmt);
		echo "hi ".mysqli_stmt_num_rows($stmt);
		if(mysqli_stmt_num_rows($stmt)>0)
		{
			$total=mysqli_stmt_num_rows($stmt);
			mysqli_stmt_bind_result($stmt,  $book_id,$booking_date, $room_id);
			
			//if(mysqli_stmt_fetch($stmt))
				for($i=0;$i<$total;$i++)
				{
					if(mysqli_stmt_fetch($stmt))
					$data.=$room_id;
				}
		}
	}
}
*/

$result = $connection->query($sql);


$data='<table>
		<col width="70">
  	<col width="420">
  	<col width="150">
  	<col width="200">
  	<col width="150">
  	<col width="150">
  	<tr>
		<th>Sr No</th>
    <th>Image</th>
    <th>City</th>
    <th>Area</th>
		<th>Date</th>
		<th>Time</th>
  </tr>';
  //</table>";
$t=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //$data.= $row["book_id"]. "  -------------         " . $row["booking_date"]. "    -----------        " . $row["room_id"]. "<br>";
        
        $temp=$row["pic_location"]."/".explode("/",$row["pic_location"])[1].".jpg";
        //echo $temp;
				$data.='<tr>
									<td>'.
										$t.'
									</td>
									<td>
										<img src="'.$temp.'" style="width:400px;height:200px;" alt="cannot load image">
									</td>
									<td>'.
										$row["rcity"].
										'
									</td>
									<td>'.
									$row["rarea"].'
									</td>
									<td>'.
										$row["booking_date"].'
									</td>
									<td>'.
										$row["start_time"].'
									</td>
								</tr>';
				$t++;
    }
} else {
    //$data.='<td style="text-align:center;">1</td><td><img src="pics/9/9.jpg" alt="cannot load image" style="width:500px;height:200px;"></td>';//'<p style="text-align:center;">No upcoming bookings</p>';
		$data='<p style="text-align:center;">No upcoming bookings</p>';
}

$data.="</table>";


$data2='<table>
		<col width="70">
  	<col width="420">
  	<col width="150">
  	<col width="200">
  	<col width="150">
  	<col width="150">
  	<tr>
		<th>Sr No</th>
    <th>Image</th>
    <th>City</th>
    <th>Area</th>
		<th>Date</th>
		<th>Time</th>
  </tr>';
  //</table>";




$sql2="select bookings.booking_date, slots.start_time,rooms.rarea,rooms.rcity,rooms.pic_location,accounts.Name from bookings,slots,rooms,accounts where slots.slot_id=bookings.slot_id and rooms.room_id=bookings.room_id and accounts.Email=bookings.user_id and bookings.user_id='$email' and booking_date<CURDATE()";
$result = $connection->query($sql2);
$t=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //$data.= $row["book_id"]. "  -------------         " . $row["booking_date"]. "    -----------        " . $row["room_id"]. "<br>";
        
        $temp=$row["pic_location"]."/".explode("/",$row["pic_location"])[1].".jpg";
        //echo $temp;
				$data2.='<tr>
									<td>'.
										$t.'
									</td>
									<td>
										<img src="'.$temp.'" style="width:400px;height:200px;" alt="cannot load image">
									</td>
									<td>'.
										$row["rcity"].
										'
									</td>
									<td>'.
									$row["rarea"].'
									</td>
									<td>'.
										$row["booking_date"].'
									</td>
									<td>'.
										$row["start_time"].'
									</td>
								</tr>';
				$t++;
    }
} else {
    //$data.='<td style="text-align:center;">1</td><td><img src="pics/9/9.jpg" alt="cannot load image" style="width:500px;height:200px;"></td>';//'<p style="text-align:center;">No upcoming bookings</p>';
		$data2='<p style="text-align:center;">No previous bookings</p>';
}
$data2.="</table>";


//$data2='<p style="text-align:center;">No previous bookings</p>';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <style type="text/css">
    	table, th, td {
  			border: 1px solid black;
  			text-align: center;
  			margin-left:22px;
  			margin-top:20px;
  				
			}
    </style>
    <script type="text/javascript">
    	function b1()
    	{
    		document.getElementById("data1").style.display="block";
    		document.getElementById("data2").style.display="none";
		document.getElementById("btn1").style.background="#000";
		document.getElementById("btn2").style.background="#444";
	}
	function b2()
    	{
    		document.getElementById("data2").style.display="block";
    		document.getElementById("data1").style.display="none";
		document.getElementById("btn1").style.background="#444";
		document.getElementById("btn2").style.background="#000";
			}
    </script>
</head>
<body onload="b1()">
		
	<div>
		<!--	<div style="background-color:#333;margin-top:0px;height:70px;padding-top:10px;">
				<h1 style="color:#fff;font-size:32px;">Meeting Room Booking System</h1>
			</div>  -->
			<div class="navbar">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<a href="dashboard.php">Dashboard</a>
				<a href="aboutus.xml">About Us</a>
				<a href="findpage.php">Find</a>
				<div class="dropdown">
		  		<button class="dropbtn" style="width:200px;"><?php echo explode(" ",$_SESSION["username"])[0]?> 
		    		<i class="fa fa-caret-down"></i>
		  		</button>
		  		<div class="dropdown-content">
		    		<a href="reset_password.php">Change Password</a>
		    		<a href="logout.php">Logout</a>
		  		</div>
				</div> 
			</div>
	<!--</div>-->		
	
			<div class="data" style="top:140px;position:absolute;overflow:auto;height:820px;width:67%;margin-left:16%;border:solid">
				
				<h2 style="margin-top:5%; text-align:center;font-size:40px">Your Bookings</h2>
				<div style="border:solid;margin-top:2%;margin-left:6px;width:98%;">
					<div class="bookings">
						<button class="book_btn" id="btn1" onclick="b1()">Upcoming Bookings</button>
						<button class="book_btn" id="btn2" onclick="b2()">Previous Bookings</button>
					</div>
						<div id="data1">
						<?php echo $data;?>
						</div>
						<div id="data2">
						<?php echo $data2;?>
						</div>
				</div> 
			</div>    


			<section class="foot">
				<a href="FAQ.php" style="margin-left:7%;">FAQs</a>
				<a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
				<a href="feedback.php"  style="margin-left:20%;">Feedback</a>
				<a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
			</section>
	</div>
</body>
</html>



