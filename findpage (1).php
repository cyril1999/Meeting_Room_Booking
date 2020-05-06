<?php

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
  <h1 class="heading"><b>MEETING ROOM BOOKING</b></h1>
  <div class="grid-container">

<a class="nav_bar" href="login.html">Home</a>
<a class="nav_bar" href="login.html">Login</a>
<a class="nav_bar" href="findpage.php">Locate A Room</a>
<a class="nav_bar" href="sitemap.xml">Sitemap</a>


</div>
    </section>  

<div class="container">
<!-- Removed unecessary containers -->
<form method="post" action="search.php">
    <!-- added class name to select -->
    <select class="selectcity" id="City" onchange="$.getArea()" name="City">

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
<!-- added class name to select -->
<select class="selectarea" id="Area" name="Area">
<?php
// print_r($storecity)
foreach($city[$storecity][1] as $c)
{
    echo '<option value="'.$c.'">'.$c.'</option>';
}

?>

    </select>
<!-- added class name to select -->
    <select class="selectprice" id="Price" name="Price">
<option value="0">1-500</option>
<option value="1">501-1000</option>
<option value="2">1001-3000</option>
<option value="3">3001-5000</option>
<option value="4">5001-8000</option>
<option value="5"> &gt;8000</option>
</select>
<!-- added class name to input -->
<input class="date" type="date" name="date" value="date">
<input class="search" type="submit" name="Search" value="Search"> 
</form>

</div>
</body>
</html>
