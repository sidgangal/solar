
<head>
  <title>Alter Order</title>
      
<header>
        <h1>WELCOME: </h1>
        
</header>

  <!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>database connections</title>
    </head>
    <body>

      <?php

  //session_start();
    //$user= $_SESSION['user'];
     // $username = "root";
      //$//password = "beagle";
      //$host = "localhost";
      echo nl2br ("here0\n");
 $l1 = $_POST['l1'];
        $l2 = $_POST['l2'];
        $f1 = $_POST['f1'];
        $f2 = $_POST['f2'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];

    $load = (25*$l1 *$l2 )+ (100 * $f1 * $f2) + (200 *$t1 * $t2);

   echo nl2br($load);
   echo nl2br("\n");

      $conn = mysqli_connect("localhost", "root", "beagle", "solar");
      //echo "step1";
// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
} 

     // $connector = mysql_connect($host,$username,$password)
       //   or die("Unable to connect");
        //  echo "step2";
        echo nl2br ("Connections are made successfully::\n");
      //$selected = mysql_select_db("solar", $connector)
       // or die("Unable to connect");
       // echo "here2";
$parr = $load/(4.5 * 0.75 * 0.8);
$pbatt = $load * 3 / (0.85 * 0.95 * 0.8 * 12);
echo ($parr);
echo nl2br ("\n");

   $result = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = $parr");
    if ($result->num_rows != 0) {
      $row = mysqli_fetch_array($result);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        echo nl2br ("You should use 1 $name panel costing $price ");
    }
    else if ($parr <100 && $parr > 75){
        $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 100");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        echo nl2br ("You should use 1 $name panel costing $price \n");
    }

    else if ($parr <150 && $parr > 100){
      $result2 = mysqli_query($conn,"SELECT PRICE , NAME  FROM panels where W = 150");
        $row = mysqli_fetch_array($result2);
      //echo nl2br ($row);
      $name = $row["NAME"];
      $price = $row["PRICE"];
        echo nl2br ("You should use 1 $name panel costing $price \n");
    }

    else if ($parr> 320){
      echo nl2br ("succ entered\n ");
    
      $s1 = (int)($parr/320);
      echo ($s1);
      echo nl2br ("\n");
     $rem1 = $parr - $s1 * 320;
      echo ($rem1);
      echo nl2br ("\n");
      if ($rem1 > 280) {
        $rem = 320;
       echo ($rem);
     }
        else if ($rem1 > 250 && $rem1 <= 280) {
          $rem = 280;
        } 
      else if ($rem1 > 200 && $rem1 <= 250) { $rem = 250; }
      else if ($rem1 > 150 && $rem1 <= 200) { $rem = 200; }
      else if ($rem1 > 100 && $rem1 <= 150) { $rem = 150; }
      else if ($rem1 <= 100) { $rem = 100; }
      else { echo ("error in series combination"); }

      if ($rem == 320) {
        $s1 = $s1 +1;
        echo nl2br ("You should use $s1 320 W panels in series");
    }
    else {
      echo nl2br ("You should use $s1 320 W panels and 1 $rem W panel in series");
    }
    }


     else echo ("error in parr");
      
      //execute the SQL query and return records
     // $result = mysql_query("SELECT vegetable, qty FROM orders where user='$user'") or die("htt");
  //$res2=mysql_fetch_assoc($result) or die("You have no pending order");


//if($res2!= FALSE ){echo "  Your current order::";}

      ?>





     
     <?php mysql_close($connector);
       ?>
    </body>
    </html>
  <!-- <h1>Modify your order/change the quantity here:</h1> -->
  
    <form action="contact.html">
    <!--<input type="radio" name="back" value="Back"> -->
    
    <input type="submit" value="back">
    </form>   
    
</div>
</body>
</html>

