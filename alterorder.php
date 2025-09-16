
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

      function get_post_float($name)
      {
          $value = filter_input(INPUT_POST, $name, FILTER_VALIDATE_FLOAT);
          if ($value === false || $value === null) {
              return 0.0;
          }

          return max(0.0, (float) $value);
      }

      $l1 = get_post_float('l1');
      $l2 = get_post_float('l2');
      $f1 = get_post_float('f1');
      $f2 = get_post_float('f2');
      $t1 = get_post_float('t1');
      $t2 = get_post_float('t2');

    $load = (25*$l1 *$l2 )+ (100 * $f1 * $f2) + (200 *$t1 * $t2);

   echo nl2br($load);
   echo nl2br("\n");

      require_once __DIR__ . '/config.php';

      try {
          $conn = create_db_connection();
      } catch (RuntimeException $exception) {
          error_log($exception->getMessage());
          http_response_code(500);
          echo 'Unable to connect to the database.';
          exit;
      }
      //echo "step1";

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

   require_once __DIR__ . '/lib/calculations.php';

   try {
       $panelComponents = fetch_components($conn, 'panels');
       $panelRecommendations = recommend_components($panelComponents, $parr, 'panel');

       foreach ($panelRecommendations as $recommendation) {
           echo nl2br($recommendation . "\n");
       }
   } catch (RuntimeException $exception) {
       error_log($exception->getMessage());
       echo nl2br("Unable to retrieve panel pricing at this time.\n");
   }
      
      //execute the SQL query and return records
     // $result = mysql_query("SELECT vegetable, qty FROM orders where user='$user'") or die("htt");
  //$res2=mysql_fetch_assoc($result) or die("You have no pending order");


//if($res2!= FALSE ){echo "  Your current order::";}

      ?>





     
     <?php $conn->close();
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

