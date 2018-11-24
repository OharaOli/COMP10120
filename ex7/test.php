<!DOCTYPE html>
<html lang="en">

   <head>
      <!-- Displayed in the tab of the web browser -->
      <title>Enter Details</title>

      <!-- Link to an external style sheet -->
      <link rel="stylesheet" href="style.css">

   </head>

   <body>

      <?php
      if(isset($_POST["submit"])){
         include 'config.inc.php';

         $conn = new mysqli($database_host, $database_user, $database_pass, $database_name);

         // Check connection
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }

         $givenName = $_POST["name"];
         $givenEmail = $_POST["email"];

         $sql = "SELECT * FROM users WHERE name = '$givenName'";
         $result = $conn->query($sql);

         if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
         }

         if (mysqli_num_rows($result) > 0) {
            echo  $givenName. " you are already registered<br>";
         } else {
            echo "You are not registered so we'll add you to the database<br>";
            $sql = "INSERT INTO users(name, email)VALUES ('".$_POST["name"]."',' ".$_POST["email"]."')";
            if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
         }


         $conn->close();
       }

      ?>


      <!-- Simple web form to retrieve details and send it to another page
           Validation will take place on the second page, assuming this is the
           stage it is sent to the server -->
      <h2>&lt; Please enter your details... &gt;</h2>

      <!-- Post the data from the form to the page linked below -->
      <form action="" method="post">
         <label>Name :</label>
         <input type = "text" name = "name" id = "name" />
         <br>
         <br>
         <label>Email :</label>
         <input type = "text" name = "email" id = "email" />
         <br>
         <br>
         <input type = "submit" value ="Submit" name = "submit"/>
         <br>
      </form>

   </body>

</html>
