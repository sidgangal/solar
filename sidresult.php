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

      $conn = mysqli_connect("localhost", "root", "beagle", "solar");
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
        
          if ($_POST['ac/dc'] == "ac") {

          // echo nl2br ("hereee in ac\n"); 
echo ($parr);
echo nl2br ("parr\n");
echo ($pbatt);
echo nl2br ("pbatt\n");

 $result = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = $parr");
    if ($result->num_rows != 0) {
      $row = mysqli_fetch_array($result);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

 ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use 1 $name panel costing Rs $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
        
    }
    
else if ($parr <=75 ){
        $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 75");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing Rs $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

       
    }
    else if ($parr <=100 && $parr > 75){
        $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 100");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing  Rs $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
        
    }

    else if ($parr <=150 && $parr > 100){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 150");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];


 ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

        
    }

    else if ($parr <=200 && $parr > 150){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 200");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
        
    }

    else if ($parr <=250 && $parr > 200){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 250");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
    }


else if ($parr <=280 && $parr > 250){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 280");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"]; ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php  }

    else if ($parr <=320 && $parr > 280){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 320");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }


    else if ($parr> 320){
     // echo nl2br ("succ entered\n ");
    
      $s1 = (int)($parr/320);
      //echo ($s1);
      //echo nl2br ("\n");
     $rem1 = $parr - $s1 * 320;
      //echo ($rem1);
      //echo nl2br ("\n");
      if ($rem1 > 280) {
        $rem = 320;
       //echo ($rem);
     }
        else if ($rem1 > 250 && $rem1 <= 280) {
          $rem = 280;
        } 
      else if ($rem1 > 200 && $rem1 <= 250) { $rem = 250; }
      else if ($rem1 > 150 && $rem1 <= 200) { $rem = 200; }
      else if ($rem1 > 100 && $rem1 <= 150) { $rem = 150; }
      else if ($rem1 <= 100) { $rem = 100; }
      else { echo ("error in parrallel combination"); }

      if ($rem == 320) {
        $s1 = $s1 +1;

?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use $s1 320 W panels in parallel"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

        
    }
    else {
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use $s1 320 W panels and 1 $rem W panel in parallel"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

     
    }
    }


     else echo ("error in parr");



     $result3 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = $pbatt");
    if ($result3->num_rows != 0) {
      $row = mysqli_fetch_array($result3);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

        
    }
    
else if ($pbatt <=40){
        $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 40");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
        
    }
    else if ($pbatt <=75 && $pbatt > 40){
        $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 75");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt<=80 && $pbatt > 75){
      $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 80");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt <=120 && $pbatt> 80){
      $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 120");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt <=150 && $pbatt > 120){
      $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 150");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
       ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt <=200 && $pbatt > 150){
      $result4= mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 200");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }


    else if ($pbatt> 200){
      //echo nl2br ("succ entered\n ");
    
      $s1 = (int)($pbatt/200);
     echo ($s1);
      echo nl2br ("\n");
     $rem1 = $pbatt - $s1 * 200;
      echo ($rem1);
      echo nl2br ("rem1\n");
      if ($rem1 > 150) {
        $rem = 200;
       echo ($rem);
     }
        else if ($rem1 > 120 && $rem1 <= 150) {
          $rem = 150;
        } 
      else if ($rem1 > 80 && $rem1 <= 120) { $rem = 120; }
      else if ($rem1 > 75 && $rem1 <= 80) { $rem = 80; }
      else if ($rem1 > 40 && $rem1 <= 75) { $rem = 75; }
      else if ($rem1 <= 40) { $rem = 40; echo ($rem); }
      else { echo ("error in parallel combination"); }

      if ($rem == 200) {
        $s1 = $s1 +1;

        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php   echo nl2br ("You should use $s1 200 A batteries in parallel"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
       
    }
    else {
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use $s1 Sukam 200 A batteries and 1 $rem A battery in parallel");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

      
    }
    }


     else echo ("error in calculating pbatt");






     $result5 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = $load");
    if ($result5->num_rows != 0) {
      $row = mysqli_fetch_array($result5);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

       ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
        
    }
    else if ($load <=75 ){
        $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 75");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  
</div>
        
   <?php
    }

    else if ($load<=100 && $load > 75){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 100");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

   else if ($load<=150 && $load > 100){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 150");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

   else if ($load<=750 && $load > 150){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 750");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

   else if ($load<=900 && $load > 750){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 900");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }


else if ($load<=1100 && $load > 900){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 1100");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

else if ($load<=1600 && $load > 1100){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 1600");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
          ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

else if ($load<=3500 && $load > 1600){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM inverters where W = 3500");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt> 3500){
      //echo nl2br ("succ entered\n ");
    
      $s1 = (int)($batt/3500);
     // echo ($s1);
      //echo nl2br ("\n");
     $rem1 = $pbatt - $s1 * 3500;
      //echo ($rem1);
      //echo nl2br ("\n");
      if ($rem1 > 1600) {
        $rem = 3500;
       //echo ($rem);
     }
        else if ($rem1 > 1100 && $rem1 <= 1600) {
          $rem = 1600;
        } 
      else if ($rem1 > 900 && $rem1 <= 1100) { $rem = 1100; }
      else if ($rem1 > 750 && $rem1 <= 900) { $rem = 900; }
      else if ($rem1 > 150 && $rem1 <= 750) { $rem = 750; }
      else if ($rem1 > 100 && $rem1 <= 150) { $rem = 150; }
      else if ($rem1 > 75 && $rem1 <= 100) { $rem = 100; }
      else if ($rem1 <= 75) { $rem = 75; }
      else { echo ("error in parallel combination"); }

      if ($rem == 3500) {
        $s1 = $s1 +1;

          ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use $s1 3500 W inverters in parallel");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
        
    }
    else {

        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php    echo nl2br ("You should use $s1 3500 W inverters and 1 $rem W inverters in parallel");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    
    }
    }


     else echo ("error in calculating load");




}



else if ($_POST['ac/dc'] == "dc" ){
$load = (25*$l1 *$l2 )+ (100 * $f1 * $f2) + (200 *$t1 * $t2) + (50 * $s1 *$s2) +(50 * $la1 *$la2) + (15 * $m1 * $m2) + (300 * $fr1 *$fr2);    
$parr = $load/(5 * 0.75 * 0.8);
$pbatt = $load * 2 / (.95 * 0.8 * 12);
$load = ((25*$l1 )+ (100 * $f1 ) + (200 *$t1 ) + (50 * $s1 ) +(50 * $la1) + (15 * $m1 ) + (300 * $fr1 ))*1.4;

//echo ($parr);
//echo nl2br ("ending\n");

 $result = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = $parr");
    if ($result->num_rows != 0) {
      $row = mysqli_fetch_array($result);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

 ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use 1 $name panel costing Rs $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
        
    }
    
else if ($parr <=75 ){
        $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 75");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing Rs $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

       
    }
    else if ($parr <=100 && $parr > 75){
        $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 100");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing  Rs $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
        
    }

    else if ($parr <=150 && $parr > 100){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 150");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];


 ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

        
    }

    else if ($parr <=200 && $parr > 150){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 200");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
        
    }

    else if ($parr <=250 && $parr > 200){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 250");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
    }


else if ($parr <=280 && $parr > 250){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 280");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"]; ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php  }

    else if ($parr <=320 && $parr > 280){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 320");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use 1 $name panel costing $price \n"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }


    else if ($parr> 320){
     // echo nl2br ("succ entered\n ");
    
      $s1 = (int)($parr/320);
      //echo ($s1);
      //echo nl2br ("\n");
     $rem1 = $parr - $s1 * 320;
      //echo ($rem1);
      //echo nl2br ("\n");
      if ($rem1 > 280) {
        $rem = 320;
       //echo ($rem);
     }
        else if ($rem1 > 250 && $rem1 <= 280) {
          $rem = 280;
        } 
      else if ($rem1 > 200 && $rem1 <= 250) { $rem = 250; }
      else if ($rem1 > 150 && $rem1 <= 200) { $rem = 200; }
      else if ($rem1 > 100 && $rem1 <= 150) { $rem = 150; }
      else if ($rem1 <= 100) { $rem = 100; }
      else { echo ("error in parallel combination"); }

      if ($rem == 320) {
        $s1 = $s1 +1;

?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php echo nl2br ("You should use $s1 320 W panels in parallel"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

        
    }
    else {
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use $s1 320 W panels and 1 $rem W panel in parallel"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

     
    }
    }


     else echo ("error in parr");



     $result3 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = $pbatt");
    if ($result3->num_rows != 0) {
      $row = mysqli_fetch_array($result3);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

        
    }
    
else if ($pbatt <=40){
        $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 40");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
        
    }
    else if ($pbatt <=75 && $pbatt > 40){
        $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 75");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt<=80 && $pbatt > 75){
      $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 80");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt <=120 && $pbatt> 80){
      $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 120");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt <=150 && $pbatt > 120){
      $result4 = mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 150");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
       ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($pbatt <=200 && $pbatt > 150){
      $result4= mysqli_query($conn,"SELECT PRICE , NAME  FROM battery where W = 200");
        $row = mysqli_fetch_array($result4);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name battery costing $price "); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }


    else if ($pbatt> 200){
      //echo nl2br ("succ entered\n ");
    
      $s1 = (int)($batt/200);
     // echo ($s1);
      //echo nl2br ("\n");
     $rem1 = $pbatt - $s1 * 200;
      //echo ($rem1);
      //echo nl2br ("\n");
      if ($rem1 > 150) {
        $rem = 200;
       //echo ($rem);
     }
        else if ($rem1 > 120 && $rem1 <= 150) {
          $rem = 150;
        } 
      else if ($rem1 > 80 && $rem1 <= 120) { $rem = 120; }
      else if ($rem1 > 75 && $rem1 <= 80) { $rem = 80; }
      else if ($rem1 > 40 && $rem1 <= 75) { $rem = 75; }
      else if ($rem1 <= 40) { $rem = 40; }
      else { echo ("error in parallel combination"); }

      if ($rem == 200) {
        $s1 = $s1 +1;

        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php   echo nl2br ("You should use $s1 200 A-h batteries in parallel"); ?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
       
    }
    else {
      ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use $s1 200 W batteries and 1 $rem W battery in parallel");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php

      
    }
    }


     else echo ("error in calculating pbatt");






     $result5 = mysqli_query($conn,"SELECT PRICE , NAME  FROM dc_inverter where W = $load");
    if ($result5->num_rows != 0) {
      $row = mysqli_fetch_array($result5);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];

       ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name DC inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
      
        
    }
    else if ($load <=500){
        $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM dc_inverter where W = 500");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name DC inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

    else if ($load<=1000 && $load > 500){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM dc_inverter where W = 1000");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name DC inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

   else if ($load<=1500 && $load > 1000){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM dc_inverter where W = 1500");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name dc inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

   else if ($load<=2000 && $load > 1500){
      $result6 = mysqli_query($conn,"SELECT PRICE , NAME  FROM dc_inverter where W = 2000");
        $row = mysqli_fetch_array($result6);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
         ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use 1 $name DC inverter costing $price ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    }

  
    

    else if ($load> 2000){
      //echo nl2br ("succ entered\n ");
    
      $s1 = (int)($batt/2000);
     // echo ($s1);
      //echo nl2br ("\n");
     $rem1 = $pbatt - $s1 * 2000;
      //echo ($rem1);
      //echo nl2br ("\n");
      if ($rem1 > 1500) {
        $rem = 2000;
       //echo ($rem);
     }
        else if ($rem1 > 1000 && $rem1 <= 1500) {
          $rem = 1500;
        } 
      else if ($rem1 > 500 && $rem1 <= 1000) { $rem = 1000; }
      
      else if ($rem1 <= 500) { $rem = 500; }
      else { echo ("error in parallel combination"); }

      if ($rem == 2000) {
        $s1 = $s1 +1;

          ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php  echo nl2br ("You should use $s1 2000 W DC inverterless ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
        
    }
    else {

        ?>

      <div class="w3-container w3-center w3-padding-32"> 
  <h2><b> <?php    echo nl2br ("You should use $s1 2000 W DC inverters and 1 $rem W DC inverters ");?> </b></h2> 

</div>
   <div class="w3-container w3-center w3-padding-32"> 
  

</div>
        
   <?php
    
    }
    }


     else echo ("error in calculating load");




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
