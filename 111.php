<?php

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var FlagE=true;
    var FlagP=true;
    var FlagPhone=true;
    var FlagName=true;
    window.onload=function()
    {
    	var f=document.getElementById("register_form");
    	f.reset();
    	// f.disabled_captcha.value="mng";
    	// f.Name.value="";
    	// document.getElementsByTagName("input").value = "";

    }
$(document).ready(function(){
// alert('yash');
var alpha="abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
// alert(alpha.length);

var str='';
var len=alpha.length;
for(var i=0;i<4;i++)
{
var x=Math.floor(Math.random()*100);
x=x%len;
str+=alpha[x];

}

// alert(str);
$('#disabled_captcha').html(str)
// alert($('#disabled_captcha').val());



// var str=alpha[x%len];
// alert(str);
$('#RW').attr("src","null.png");
$('#RW1').attr("src","null.png");
$('#RW2').attr("src","null.png");
$('#RW3').attr("src","null.png");
$.Checkemail=function(email)
{
// alert('change');
// var checkem=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
var checkem=/^\w+([\.-]?\w+)*@\w+([\.]?\w+)?(\.\w{2,3})$/;
//alert(email.value);
var x= checkem.test(email.value);
//alert(x);
 if(x)
 {
    FlagE=true;
    $('#RW').attr("src","https://img.icons8.com/color/48/000000/checkmark.png");
 }
 else{
    FlagE=false;
$('#RW').attr("src","https://img.icons8.com/color/48/000000/delete-sign.png");
 }
}

$.phoneval=function(phone){

// alert(phone.value);
var mobile=phone.value;
var ph=/^[0-9]+/;
// alert(gettype(mobile));
if(mobile.length!=10 || !ph.test(mobile)){

FlagPhone=false;
$('#RW2').attr("src","https://img.icons8.com/color/48/000000/delete-sign.png");

}
else
{
FlagPhone=true;
$('#RW2').attr("src","https://img.icons8.com/color/48/000000/checkmark.png");
}
    

}

$.pass=function(pas){
    var rpassword=pas.value;
    // alert(password);
    var password=$('#PASSWORD').val();
    // alert(password);
    if(password==rpassword)
    {
        FlagP=true;
        $('#RW1').attr("src","https://img.icons8.com/color/48/000000/checkmark.png");
    }
    else
    {
         FlagP=false;
         $('#RW1').attr("src","https://img.icons8.com/color/48/000000/delete-sign.png");
    }
}
$.Name=function(na){
    // alert('name');
    var reg=/^([a-zA-Z]+)$/;
    FlagName=reg.test(na.value);
    if(FlagName)
    {
        $('#RW3').attr("src","https://img.icons8.com/color/48/000000/checkmark.png");
    }
else{
    $('#RW3').attr("src","https://img.icons8.com/color/48/000000/delete-sign.png");
}

}
$.reset=function(){

    // alert('reset');
    $('#RW').attr("src","null.png");
$('#RW1').attr("src","null.png");
$('#RW2').attr("src","null.png");
$('#RW3').attr("src","null.png");


}
$.valdiate=function()
{
    // alert('jjj');
    // alert($('#register-captcha').val());
    if(str!=$('#register-captcha').val())
    {
        alert('incorrect cpatcha');
        return false;
    }
    if(FlagP && FlagPhone && FlagE && FlagName)
    {
        // alert('true');
        return true;
    }
    return false;
}



});
</script>

</head>
<body class="body">
<!--<section class="custom-nav">
 
   <img class="logo" src="logo.jpg"/>
  <h1 class="heading"><b>MEETING ROOM</b></h1>

    </section>
<br><br>

<div class="grid-container">

        <a class="nav_bar" href="login.html">Home</a>
 
        <a class="nav_bar" href="login.html">Login</a>
   
        <a class="nav_bar" href="login.html">Locate A Room</a>
    
        <a class="nav_bar" href="sitemap.xml">Sitemap</a>


</div>
<br>
<br>-->
<div class="navbar1">
				<h1 style="color:#fff;text-align:center;">Meeting Room Booking System</h1>
				<a href="dashboard.php">Home</a>
				<a href="aboutus.xml">About Us</a>
				<a href="findpage.php">Find</a>
				<a href="login.php" style="float:right;">Login</a> 
			</div>

<section class="Flex">


    <form method="post" onsubmit="return $.valdiate()" id="register_form" action="SignUp.php">
    <section class="flex-container">
        
           
            <div class="flexbox-container">
                 &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;<input onchange="$.Name(this)"  placeholder="Name" class=" align-right" type="text" name="Name" required
                 style="border-top-left-radius:20px;
               border-bottom-left-radius:20px;
    height:25px;
    width:160px;
    padding:10px;
    border:none;
    margin-bottom:10px;" >
 <img id="RW3" src="https://img.icons8.com/color/48/000000/delete-sign.png" class="RightWrong">
</div>
           
           <div class="flexbox-container">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input onchange="$.Checkemail(this)"  placeholder="Email" class="align-right" type="text" required name="Email"
               style="border-top-left-radius:20px;
               border-bottom-left-radius:20px;
    height:25px;
    width:160px;
    padding:10px;
    border:none;
    margin-bottom:10px;">
    <img id="RW" src="https://img.icons8.com/color/48/000000/delete-sign.png" class="RightWrong">
<!--<p  id="register-correctE">&#9989; </p> <p  id="register-wrongE">&#10060;</p> -->
</div>
            <div class="flexbox-container">
            &nbsp;&nbsp;&nbsp;<input id="PASSWORD" placeholder="Password" class="input-field-register align-right" type="password" required name="Password"></div>

            <div class="flexbox-container">
                &nbsp;&nbsp;&nbsp;<input onchange="$.pass(this)" id="RPassword"  placeholder="Re-Password" class="RightWrongInput align-right" type="password" required name="RPassword"
                
                >
                   <img id="RW1" src="https://img.icons8.com/color/48/000000/delete-sign.png" class="RightWrong">

<!--<p  id="register-correct">&#9989; </p> <p  id="register-wrong">&#10060;</p> -->
</div>


                <div class="flexbox-container">
                    &nbsp;&nbsp;&nbsp;<input onchange="$.phoneval(this)" maxlength="10"  placeholder="Phone" class="RightWrongInput align-right" type="number"  required name="Phone">
<img id="RW2" src="https://img.icons8.com/color/48/000000/delete-sign.png" class="RightWrong">
                </div>
                    <div class="flexbox-container">
                        <div style="" name="disabled_captcha"  disabled class="captcha"><p id="disabled_captcha"></p>
                        </div>
                    
                        &nbsp;&nbsp;&nbsp;
                        <input autocomplete="off" id="register-captcha" style="width:100px; height:30px; border-radius: 10px;"  placeholder="Captcha" style="border-radius:5px;" class="input-field-register align-right" type="text" required name="Captcha"></div>

                        <div class="flex-start">
                            <a href="login.html"> <button type="button" class="button1" style="width: 110px;">Sign in Instead</button></a>
                            &nbsp;&nbsp;&nbsp;  <input type="submit" name="Register" style="width: 110px;" class="button1" value="Register">
                        </div>
                        <div class="flexbox-container">
                        	<input onclick="$.reset()" type="reset" name="Clear" value="Clear Form" class="button1" />
                        </div>
                  
    </section>
</form>  

    
</section>
<section class="foot" style="margin-top:20px;">
    <a href="FAQ.php" style="margin-left:7%;">FAQs</a>
    <a href="TnC.xml" style="margin-left:20%;">Terms & Conditions</a>
    <a href="feedback.php"  style="margin-left:20%;">Feedback</a>
    <a href="sitemap.xml" style="margin-left:20%;">Sitemap</a>
</section>
</body>

</html>
