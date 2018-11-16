<!DOCTYPE html>
<html lang="en">

   <head>
      <!-- Displayed in the tab of the web browser -->
      <title>Welcome... </title>

      <!-- Link to an external style sheet -->
      <link rel="stylesheet" href="style.css">

   </head>

   <body>

      <!-- Welcome message that is customised based on who is logging in -->
      <h2>&lt; Welcome 
      <?php
      $name = $_POST["Name"];
      //If the name matches that of someone in my group change message
      if ($name == "Oliver" or $name == "Jonas" or $name == "Alex") {
         echo $_POST["Name"];
         echo " (member of Y7)\n";
      } else {
         echo $_POST["Name"];
      }
      ?>
      ... &gt;</h2>

      <!-- Output the email that is passed along with a static message -->
      <h2>We will contact you at:  <?php echo $_POST["Email"] ?></h2>

      <!-- Error checking using regex, outputs messages based on error -->
      <!-- At this point the data can be prevented from being sent to the server -->
      <?php
      $email = "";
      $emailError = "";
      $name = "";
      $nameError = "";
      if($_SERVER["REQUEST_METHOD"] == "POST"){

         //Check for empty name
         if ($_POST["Name"] == "") {
            echo "<p style='color:red;'>Warning! Name is required <br></p>";
         } else {
            $name = ($_POST["Name"]);

            //Regex taken from W3 schools example to check for bad format
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
               echo "<p style='color:red;'>Warning! Only letters and white space allowed<br></p>";
            }
         }

         //Check for empty email
         if ($_POST["Email"] == "") {
            echo "<p style='color:red;'>Warning! Email is required<br></p>";
         } else {
            $email = ($_POST["Email"]);

            //Email will be checked by type on other page, still checked
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               echo "<p style='color:red;'>Not a valid email<br></p>";
            }
         }
      }

      ?>


   </body>

</html>

