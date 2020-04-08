<?php
session_start();
include('mysqli.php');  
$query1="Select distinct rcity,rarea from rooms";
// $query1="Select distinct(Name) from accounts";
$res1=$connection->query($query1);
$city=array();
// print_r($res1);
if($res1)
{
    while($temp=$res1->fetch_object())
    {
$city[$temp->rcity][0]=$temp->rcity;
$city[$temp->rcity][1][]=$temp->rarea;
    }
}
else{
    die('Error in fetching cities');
}
// $query1="Select distinct(rarea from rooms where rcity in "
// print_r($city);

$connection->close();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
       
        $.getArea=function(){

            var citychange=$('#City').val();
            //alert('YAsh'+citychange);
            $('#Area').empty();

            //AJAX Call
          $.post("GetArea.php",{City:citychange},function(res){
            // console.log(res);
           // alert('hey');
            var areas=JSON.parse(res);
            var temp='';
            for(var i=0;i<areas.length;i++)
            {
                temp+='<option value="'+areas[i]+'">'+areas[i]+'</option>';
            }   
            $('#Area').append(temp);
          
            

          });
           
       

        
        
        }


    });
</script>   
</head>
<body class="body">
<section class="custom-nav">
 
   <img class="logo" src="logo.jpg"/>
  <h1 class="heading"><b>MEETING ROOM</b></h1>

    </section>  
    <br><br>

<div class="grid-container">

        <a class="nav_bar" href="login.html">Home</a>
 
        <a class="nav_bar" href="login.html">Login</a>
   
        <a class="nav_bar" href="findpage.php">Locate A Room</a>
    
        <a class="nav_bar" href="sitemap.xml">Sitemap</a>


</div>
<br>
<br>

<div class="container">
    <div class="row">
<!-- <div class="col-3"></div> -->
<div class="col-12 mx-auto my-auto  ">

<form method="post" action="search.php">
    <select id="City" onchange="$.getArea()" name="City">

    <?php
    $flag=true;
    $storecity='x';
     foreach($city as $c)
     {
         if($flag)
         {
             $storecity=$c[0];
             $flag=false;
         }
         echo '<option value="'.$c[0].'">'.$c[0].'</option>';
        // print_r()
     }


    ?>
</select>

<select id="Area" name="Area">
<?php
// print_r($storecity)
foreach($city[$storecity][1] as $c)
{
    echo '<option value="'.$c.'">'.$c.'</option>';
}

?>

    </select>

    <select id="Price" name="Price">
<option value="0">1000-2500</option>
<option value="1">2501-4000</option>
<option value="2">4001-6000</option>
<option value="3">6001-8000</option>
<option value="4">8001-10000</option>
<option value="5"> &gt;10000</option>
</select>
<input type="date" name="Date" required>
<input type="submit" name="Search" value="Search"> 
</form>
</div>
<!-- <div class="col-3"></div> -->
</div>

</div>
</body>
</html>
