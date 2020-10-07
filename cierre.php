<!DOCTYPE html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf=8"/>
   <title>  </title>
   <body>
   <?php
@session_start();
session_destroy();
header("Location: index.php");
?>

  </body>
  </html>