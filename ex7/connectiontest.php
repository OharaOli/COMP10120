<html>
   <head>
      <title>Connecting MySQLi Server</title>
   </head>

   <body>

      <?php
         //Used to check that we can connect to the database
         //Structure of code taken from tutorialspoint.com and altered to suit my needs
         include 'config.inc.php';

         $connection = new mysqli($database_host, $database_user, $database_pass, $database_name);

         if(! $connection ){
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully';
         mysqli_close($connection);
      ?>
   </body>
</html>
