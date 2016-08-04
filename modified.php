<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<div class="w3-container w3-center w3-padding-32"> 
  <h1><b>SOLAR PV SYSTEM</b></h1>
  <p>Your savings start <span class="w3-tag">now</span></p>
</div>

<!-- About Card on medium screens -->
<div class="w3-hide-large w3-hide-small w3-margin-top w3-margin-bottom">
    <div class="w3-container w3-white w3-padding-32">
    <img src="sid.jpg" alt="Me" style="width:150px" class="w3-left w3-round-large w3-margin-right">
    <span>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</span>
  </div>
</div>

<!-- About Card on small screens -->
<div class="w3-hide-large w3-hide-medium w3-margin-top w3-margin-bottom">
  <img src="img_avatar_g.jpg" style="width:100%" alt="Me">
  <div class="w3-container w3-white">
    <h4><b>My Name</b></h4>
    <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
  </div>
</div>














      <?php

  
 $l1 = $_POST['l1'];
        $l2 = $_POST['l2'];
        $f1 = $_POST['f1'];
        $f2 = $_POST['f2'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $la1 = $_POST['la1'];
    $la2 = $_POST['la2'];
    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
    $fr1 = $_POST['fr1'];
    $fr2 = $_POST['fr2'];


    $load = (25*$l1 *$l2 )+ (100 * $f1 * $f2) + (200 *$t1 * $t2) + (50 * $s1 *$s2) +(50 * $la1 *$la2) + (15 * $m1 * $m2) + (300 * $fr1 *$fr2);
    $parr = $load/(5 * 0.75 * 0.8* 0.8);
    $pbatt = $load * 2 / (0.85 * 0.97 * 0.97 * 0.8 * 12);

    $load = ((25*$l2  )+ (100 * $f2 ) + (200 *$t2 ) + (50 * $s2 ) +(50 * $la2 ) + (15 * $m2 ) + (300 * $fr2 ))*1.4;
//   echo nl2br($load);
   echo nl2br("\n");

      $conn = mysqli_connect("localhost", "root", "redeemer", "solar");
      //echo "step1";
// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
} 

    
        echo nl2br ("Connections are made successfully::\n");
      
     if (empty($_POST['ac/dc']))
{
 echo nl2br ("emptyyyy radio\n"); 
}
        
          if ($_POST['ac/dc'] == "ac") 
          {

         
echo ($parr);
echo nl2br ("parr\n");
echo ($pbatt);
echo nl2br ("pbatt\n");

 $result = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels ORDER BY W Asc ");
if ($result->num_rows == 0) { echo ("empty table: panels"); }
else { flag = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($parr < = $row ["W"]) {
            flag =1;
            ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $row["NAME"] panel costing Rs $row["PRICE"] \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

                        }

        }
if (flag == 0)
{
     $result2 = mysqli_query($conn,"SELECT max(W)  FROM panels " );
        $row = mysqli_fetch_array($result2);
        if ($parr%$row["W"] == 0 ) {

        $num = $parr / $row["W"]; }
else {$num = $parr / $row["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num panels costing Rs $row["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    
$result3 = mysqli_query($conn,"SELECT W FROM panels
WHERE W = (SELECT MAX(W) FROM panels WHERE W < (SELECT MAX(W) FROM panels)) " );
  $row3 = mysqli_fetch_array($result3);

  if ($parr%$row3["W"] == 0 ) {

        $num = $parr / $row3["W"]; }
else {$num = $parr / $row3["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num panels costing Rs $row3["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

 $result4 = mysqli_query($conn,"SELECT W FROM panels WHERE W = (SELECT MAX(W) FROM panels WHERE W < (SELECT MAX(W) FROM panels WHERE W <
 (SELECT MAX(W) FROM panels)))");
 $row4 = mysqli_fetch_array($result4);


 if ($parr%$row4["W"] == 0 ) {

        $num = $parr / $row4["W"]; }
else {$num = $parr / $row4["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num panels costing Rs $row4["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    }

  

 } 


$result = mysqli_query($conn,"SELECT PRICE , NAME  FROM  battery ORDER BY W Asc ");
if ($result->num_rows == 0) { echo ("empty table: battery"); }
else { flag = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($pbatt < = $row ["W"]) {
            flag =1;
            ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $row["NAME"] battery costing Rs $row["PRICE"] \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  
</div>
        
   <?php


}
}

if (flag == 0)
{
     $result2 = mysqli_query($conn,"SELECT max(W)  FROM battery " );
        $row = mysqli_fetch_array($result2);
        if ($pbatt%$row["W"] == 0 ) {

        $num = $pbatt / $row["W"]; }
else {$num = $pbatt / $row["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num batteries costing Rs $row["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    
$result3 = mysqli_query($conn,"SELECT W FROM battery
WHERE W = (SELECT MAX(W) FROM battery WHERE W < (SELECT MAX(W) FROM battery)) " );
  $row3 = mysqli_fetch_array($result3);

  if ($pbatt%$row3["W"] == 0 ) {

        $num = $pbatt / $row3["W"]; }
else {$num = $pbatt / $row3["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num batteries costing Rs $row3["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

 $result4 = mysqli_query($conn,"SELECT W FROM battery WHERE W = (SELECT MAX(W) FROM battery WHERE W < (SELECT MAX(W) FROM battery WHERE W <
 (SELECT MAX(W) FROM battery)))");
 $row4 = mysqli_fetch_array($result4);


 if ($pbatt%$row4["W"] == 0 ) {

        $num = $pbatt / $row4["W"]; }
else {$num = $pbatt / $row4["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num batteries costing Rs $row4["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    }

  
}



    
$result = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters ORDER BY W Asc ");
if ($result->num_rows == 0) { echo ("empty table: inverters "); }
else { flag = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($load < = $row ["W"]) {
            flag =1;
            ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $row["NAME"] inverter costing Rs $row["PRICE"] \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  
</div>
        
   <?php


}
}

if (flag == 0)
{
     $result2 = mysqli_query($conn,"SELECT max(W)  FROM inverters " );
        $row = mysqli_fetch_array($result2);
        if ($load%$row["W"] == 0 ) {

        $num = $load / $row["W"]; }
else {$num = $load / $row["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num inverters costing Rs $row["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    
$result3 = mysqli_query($conn,"SELECT W FROM inverters
WHERE W = (SELECT MAX(W) FROM inverters WHERE W < (SELECT MAX(W) FROM inverters)) " );
  $row3 = mysqli_fetch_array($result3);

  if ($load%$row3["W"] == 0 ) {

        $num = $load / $row3["W"]; }
else {$num = $load / $row3["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num inverters costing Rs $row3["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

 $result4 = mysqli_query($conn,"SELECT W FROM inverters WHERE W = (SELECT MAX(W) FROM inverters WHERE W < (SELECT MAX(W) FROM inverters WHERE W <
 (SELECT MAX(W) FROM inverters)))");
 $row4 = mysqli_fetch_array($result4);


 if ($pbatt%$row4["W"] == 0 ) {

        $num = $load / $row4["W"]; }
else {$num = $load / $row4["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num inverters costing Rs $row4["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    }

  
}



    

}


else if ($_POST['ac/dc'] == "dc" ){
$load = (25*$l1 *$l2 )+ (100 * $f1 * $f2) + (200 *$t1 * $t2) + (50 * $s1 *$s2) +(50 * $la1 *$la2) + (15 * $m1 * $m2) + (300 * $fr1 *$fr2);    
$parr = $load/(5 * 0.75 * 0.8);
$pbatt = $load * 2 / (.95 * 0.8 * 12);
$load = ((25*$l1 )+ (100 * $f1 ) + (200 *$t1 ) + (50 * $s1 ) +(50 * $la1) + (15 * $m1 ) + (300 * $fr1 ))*1.4;

//echo ($parr);
//echo nl2br ("ending\n");

$result = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels ORDER BY W Asc ");
if ($result->num_rows == 0) { echo ("empty table: panels"); }
else { flag = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($parr < = $row ["W"]) {
            flag =1;
            ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $row["NAME"] panel costing Rs $row["PRICE"] \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

                        }

        }
if (flag == 0)
{
     $result2 = mysqli_query($conn,"SELECT max(W)  FROM panels " );
        $row = mysqli_fetch_array($result2);
        if ($parr%$row["W"] == 0 ) {

        $num = $parr / $row["W"]; }
else {$num = $parr / $row["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num panels costing Rs $row["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    
$result3 = mysqli_query($conn,"SELECT W FROM panels
WHERE W = (SELECT MAX(W) FROM panels WHERE W < (SELECT MAX(W) FROM panels)) " );
  $row3 = mysqli_fetch_array($result3);

  if ($parr%$row3["W"] == 0 ) {

        $num = $parr / $row3["W"]; }
else {$num = $parr / $row3["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num panels costing Rs $row3["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

 $result4 = mysqli_query($conn,"SELECT W FROM panels WHERE W = (SELECT MAX(W) FROM panels WHERE W < (SELECT MAX(W) FROM panels WHERE W <
 (SELECT MAX(W) FROM panels)))");
 $row4 = mysqli_fetch_array($result4);


 if ($parr%$row4["W"] == 0 ) {

        $num = $parr / $row4["W"]; }
else {$num = $parr / $row4["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num panels costing Rs $row4["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    }

  

 } 


$result = mysqli_query($conn,"SELECT PRICE , NAME  FROM  battery ORDER BY W Asc ");
if ($result->num_rows == 0) { echo ("empty table: battery"); }
else { flag = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($pbatt < = $row ["W"]) {
            flag =1;
            ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $row["NAME"] battery costing Rs $row["PRICE"] \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  
</div>
        
   <?php


}
}

if (flag == 0)
{
     $result2 = mysqli_query($conn,"SELECT max(W)  FROM battery " );
        $row = mysqli_fetch_array($result2);
        if ($pbatt%$row["W"] == 0 ) {

        $num = $pbatt / $row["W"]; }
else {$num = $pbatt / $row["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num batteries costing Rs $row["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    
$result3 = mysqli_query($conn,"SELECT W FROM battery
WHERE W = (SELECT MAX(W) FROM battery WHERE W < (SELECT MAX(W) FROM battery)) " );
  $row3 = mysqli_fetch_array($result3);

  if ($pbatt%$row3["W"] == 0 ) {

        $num = $pbatt / $row3["W"]; }
else {$num = $pbatt / $row3["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num batteries costing Rs $row3["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

 $result4 = mysqli_query($conn,"SELECT W FROM battery WHERE W = (SELECT MAX(W) FROM battery WHERE W < (SELECT MAX(W) FROM battery WHERE W <
 (SELECT MAX(W) FROM battery)))");
 $row4 = mysqli_fetch_array($result4);


 if ($pbatt%$row4["W"] == 0 ) {

        $num = $pbatt / $row4["W"]; }
else {$num = $pbatt / $row4["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num batteries costing Rs $row4["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    }

  
}



    
$result = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters ORDER BY W Asc ");
if ($result->num_rows == 0) { echo ("empty table: inverters "); }
else { flag = 0;
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    if ($load < = $row ["W"]) {
            flag =1;
            ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $row["NAME"] DC inverter costing Rs $row["PRICE"] \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  
</div>
        
   <?php


}
}

if (flag == 0)
{
     $result2 = mysqli_query($conn,"SELECT max(W)  FROM inverters " );
        $row = mysqli_fetch_array($result2);
        if ($load%$row["W"] == 0 ) {

        $num = $load / $row["W"]; }
else {$num = $load / $row["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num DC inverters costing Rs $row["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    
$result3 = mysqli_query($conn,"SELECT W FROM inverters
WHERE W = (SELECT MAX(W) FROM inverters WHERE W < (SELECT MAX(W) FROM inverters)) " );
  $row3 = mysqli_fetch_array($result3);

  if ($load%$row3["W"] == 0 ) {

        $num = $load / $row3["W"]; }
else {$num = $load / $row3["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num DC inverters costing Rs $row3["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

 $result4 = mysqli_query($conn,"SELECT W FROM inverters WHERE W = (SELECT MAX(W) FROM inverters WHERE W < (SELECT MAX(W) FROM inverters WHERE W <
 (SELECT MAX(W) FROM inverters)))");
 $row4 = mysqli_fetch_array($result4);


 if ($pbatt%$row4["W"] == 0 ) {

        $num = $load / $row4["W"]; }
else {$num = $load / $row4["W"]+1; }
            ?>
         <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use  $num DC inverters costing Rs $row4["PRICE"]*$num \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>


   <?php

    }

  
}
      

}



     
     mysql_close($connector);
       ?>
   
<h1> Please install the panels at a 43 degrees tilt to horizontal ground. </h1>













 <form action="contact.html" method="post" enctype="multipart/form-data">
          
         
        
        
      <div class="w3-container w3-center w3-padding-32"> 
 <input id="submit" name="Go back and calculate more" type="submit" value="Go back and calculate more">
</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
                
        
          
      </form>


   

</body>
</html>
